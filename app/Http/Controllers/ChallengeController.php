<?php

namespace App\Http\Controllers;

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
        'longitude' => 'nullable'
//        'latitude' => 'nullable|regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
//        'longitude' => 'nullable|regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',
    ];
    const VALIDATION_ERRORS = [
        'lat.regex' => 'De latitude lijkt in een incorrect format te zijn.',
        'long.regex' => 'De longitude lijkt in een incorrect format te zijn.'
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
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ChallengeController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            Challenge::findOrFail($id)
                ->update([
                    'title' => $request->input('title'),
                    'subtitle' => $request->input('subtitle'),
                    'content' => $request->input('content'),
                    'start_time' => $request->input('start_time'),
                    'end_time' => $request->input('end_time'),
                    'location_name' => $request->input('location_name'),
                    'location_address' => $request->input('location_address'),
                    'registration_url' => $request->input('registration_url'),
                    'latitude' => $request->input('latitude'),
                    'longitude' => $request->input('longitude')
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
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ChallengeController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $challenge = Challenge::create([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'location_name' => $request->input('location_name'),
                'location_address' => $request->input('location_address'),
                'registration_url' => $request->input('registration_url'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude')
            ]);
            return redirect()
                ->action('ChallengeController@admin');
        }
    }

    public function destroy($id) {
        Challenge::destroy($id);
        return redirect()
            ->action('ChallengeController@admin');
    }
}
