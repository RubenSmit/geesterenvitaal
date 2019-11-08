<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

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
        'registration_url' => 'nullable'
    ];

    public function index()
    {
        return view('activity.index', ['activities' => Activity::all()]);
    }

    public function admin()
    {
        return view('admin.activity.index', ['activities' => Activity::all()]);
    }

    public function show($id)
    {
        return view('activity.show', ['activity' => Activity::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('admin.activity.edit', ['activity' => Activity::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActivityController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            Activity::findOrFail($id)
                ->update([
                    'title' => $request->input('title'),
                    'content' => $request->input('content')
                ]);
            return redirect()
                ->action('ActivityController@edit', ['id' => $id]);
        }

    }

    public function new()
    {
        return view('admin.activity.new', ['activity' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActivityController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $activity = Activity::create([
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);
            return redirect()
                ->action('ActivityController@edit', ['id' => $activity->id]);
        }
    }
}
