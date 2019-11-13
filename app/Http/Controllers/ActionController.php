<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class ActionController extends Controller
{
//    TODO: Samengezond Url beperken tot Samengezonddomein
    const VALIDATION_RULES = [
        'title' => 'required|max:255|min:3',
        'content' => 'required|min:10',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'samengezond_url' => 'required|url',
        'points_required' => 'required|numeric',
        'old_price' => 'nullable|numeric',
        'discount' => 'nullable',
        'new_price' => 'nullable|numeric'
    ];

    public function index()
    {
        return view('action.index', ['actions' => Action::all()]);
    }

    public function show($id)
    {
        return view('action.show', ['action' => Action::findOrFail($id)]);
    }

    public function admin()
    {
        return view('admin.action.index', ['actions' => Action::all()]);
    }

    public function edit($id)
    {
        return view('admin.action.edit', ['action' => Action::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActionController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            Action::findOrFail($id)
                ->update([
                    'title' => $request->input('title'),
                    'content' => $request->input('content'),
                    'start_time' => $request->input('start_time'),
                    'end_time' => $request->input('end_time'),
                    'samengezond_url' => $request->input('samengezond_url'),
                    'points_required' => $request->input('points_required'),
                    'old_price' => $request->input('old_price'),
                    'discount' => $request->input('discount'),
                    'new_price' => $request->input('new_price')
                ]);
            return redirect()
                ->action('ActionController@admin');
        }
    }

    public function new()
    {
        return view('admin.action.new', ['action' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActionController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $activity = Action::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'samengezond_url' => $request->input('samengezond_url'),
                'points_required' => $request->input('points_required'),
                'old_price' => $request->input('old_price'),
                'discount' => $request->input('discount'),
                'new_price' => $request->input('new_price')
            ]);
            return redirect()
                ->action('ActionController@admin');
        }
    }
}
