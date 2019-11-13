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
        'latitude' => 'nullable|regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
        'longitude' => 'nullable|regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',
    ];
    const VALIDATION_ERRORS = [
        'lat.regex' => 'De latitude lijkt in een incorrect format te zijn.',
        'long.regex' => 'De longitude lijkt in een incorrect format te zijn.'
    ];

    public function index()
    {
        return view('challenge.index', ['challenges' => Challenge::all()]);
    }

    public function show($id)
    {
        return view('challenge.show', ['challenge' => Challenge::findOrFail($id)]);
    }
}
