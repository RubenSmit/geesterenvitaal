<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Challenge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class ChallengeController extends Controller
{
    const VALIDATION_RULES = [
        'title' => 'required|max:255|min:3',
        'subtitle' => 'required|max:255|min:3',
        'content' => 'required|min:10',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'location_name' => 'required',
        'location_address' => 'nullable',
        'registration_url' => 'nullable',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function index()
    {
        return view('challenge.index', ['challenges' => Challenge::all()]);
    }

    public function admin()
    {
        return view('admin.challenge.index', ['challenges' => Challenge::all()]);
    }

    public function show($id)
    {
        return view('challenge.show', ['challenge' => Challenge::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('admin.challenge.edit', ['challenge' => Challenge::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $request->merge(array(
            'start_time' => ($request->input('start_time_date') . " " . $request->input('start_time_time')),
            'end_time' => ($request->input('end_time_date') . " " . $request->input('end_time_time')),
        ));

        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ChallengeController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            $challenge = Challenge::findOrFail($id);
            $path = $challenge->image_url;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            $challenge->update([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'location_name' => $request->input('location_name'),
                'location_address' => $request->input('location_address'),
                'registration_url' => $request->input('registration_url'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'image_url' => $path,
            ]);
            return redirect()
                ->action('ChallengeController@admin');
        }
    }

    public function new()
    {
        return view('admin.challenge.new', ['challenge' => null]);
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
                ->action('ChallengeController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            Challenge::create([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'location_name' => $request->input('location_name'),
                'location_address' => $request->input('location_address'),
                'registration_url' => $request->input('registration_url'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'image_url' => $path,
            ]);
            return redirect()
                ->action('ChallengeController@admin');
        }
    }
}
