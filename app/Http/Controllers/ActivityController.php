<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class ActivityController extends Controller
{
    const VALIDATION_RULES = [
        'title' => 'required|max:255|min:3',
        'subtitle' => 'required|max:255|min:3',
        'content' => 'required|min:10',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'location_name' => 'required',
        'location_address' => 'nullable',
        'registration_url' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'activity_category_id' => 'required|numeric|exists:activity_categories,id',
    ];

    public function index()
    {
        return view('activity.index', ['activities' => Activity::upcoming()->get(), 'categories' => ActivityCategory::all(), 'current_category' => null]);
    }

    public function category($name)
    {
        return view('activity.index', ['activities' => Activity::upcoming()->byCategory($name)->get(), 'categories' => ActivityCategory::all(), 'current_category' => $name]);
    }

    public function admin()
    {
        return view('admin.activity.index', ['activities' => Activity::all(), 'categories' => ActivityCategory::all()]);
    }

    public function show($id)
    {
        return view('activity.show', ['activity' => Activity::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('admin.activity.edit', ['activity' => Activity::findOrFail($id), 'categories' => ActivityCategory::all()]);
    }

    public function update($id, Request $request)
    {
        $request->merge(array(
            'start_time' => Carbon::parse($request->input('start_time_date') . " " . $request->input('start_time_time')),
            'end_time' => Carbon::parse($request->input('end_time_date') . " " . $request->input('end_time_time')),
        ));

        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActivityController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            $activity = Activity::findOrFail($id);
            $path = $activity->image_url;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            $activity->update([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'location_name' => $request->input('location_name'),
                'location_address' => $request->input('location_address'),
                'registration_url' => $request->input('registration_url'),
                'image_url' => $path,
            ]);

            $activity->category()->associate(ActivityCategory::findOrFail($request->input('activity_category_id')));
            $activity->save();

            return redirect()
                ->action('ActivityController@admin');
        }

    }

    public function new()
    {
        return view('admin.activity.new', ['activity' => null, 'categories' => ActivityCategory::all()]);
    }

    public function create(Request $request)
    {
        $request->merge(array(
            'start_time' => ($request->input('start_time_date') . " " . $request->input('start_time_time')),
            'end_time' => ($request->input('end_time_date') . " " . $request->input('end_time_time')),
        ));

        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActivityController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            $activity = Activity::create([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'location_name' => $request->input('location_name'),
                'location_address' => $request->input('location_address'),
                'registration_url' => $request->input('registration_url'),
                'image_url' => $path,
            ]);

            $activity->category()->associate(ActivityCategory::findOrFail($request->input('activity_category_id')));
            $activity->save();

            return redirect()
                ->action('ActivityController@admin');
        }
    }

    public function destroy($id)
    {
        Activity::destroy($id);
        return redirect()
            ->action('ActivityController@admin');
    }
}
