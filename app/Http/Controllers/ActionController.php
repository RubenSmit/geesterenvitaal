<?php

namespace App\Http\Controllers;

use App\Action;
use App\ActionCategory;
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
        'new_price' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'action_category_id' => 'required|numeric',
    ];

    public function index()
    {
        return view('action.index', ['actions' => Action::all(), 'categories' => ActionCategory::all(), 'current_category' => null]);
    }

    public function category($name)
    {
        return view('action.index', ['actions' => Action::byCategory($name)->get(), 'categories' => ActionCategory::all(), 'current_category' => $name]);
    }

    public function show($id)
    {
        return view('action.show', ['action' => Action::findOrFail($id)]);
    }

    public function admin()
    {
        return view('admin.action.index', ['actions' => Action::all(), 'categories' => ActionCategory::all()]);
    }

    public function edit($id)
    {
        return view('admin.action.edit', ['action' => Action::findOrFail($id), 'categories' => ActionCategory::all()]);
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
                ->action('ActionController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            $action = Action::findOrFail($id);
            $path = $action->image_url;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            $action->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'samengezond_url' => $request->input('samengezond_url'),
                'points_required' => $request->input('points_required'),
                'old_price' => $request->input('old_price'),
                'discount' => $request->input('discount'),
                'new_price' => $request->input('new_price'),
                'image_url' => $path,
            ]);

            $action->category()->associate(ActionCategory::find($request->input('action_category_id')));
            $action->save();

            return redirect()
                ->action('ActionController@admin');
        }
    }

    public function new()
    {
        return view('admin.action.new', ['action' => null, 'categories' => ActionCategory::all()]);
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
                ->action('ActionController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            $action = Action::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'samengezond_url' => $request->input('samengezond_url'),
                'points_required' => $request->input('points_required'),
                'old_price' => $request->input('old_price'),
                'discount' => $request->input('discount'),
                'new_price' => $request->input('new_price'),
                'image_url' => $path,
            ]);

            $action->category()->associate(ActionCategory::find($request->input('action_category_id')));
            $action->save();

            return redirect()
                ->action('ActionController@admin');
        }
    }

    public function destroy($id)
    {
        Action::destroy($id);
        return redirect()
            ->action('ActionController@admin');
    }
}
