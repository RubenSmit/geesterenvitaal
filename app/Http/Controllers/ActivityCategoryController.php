<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class ActivityCategoryController extends Controller
{
    const VALIDATION_RULES = [
        'name' => 'required|max:255|min:3',
    ];

    public function edit($id)
    {
        return view('admin.activity_category.edit', ['activity_category' => ActivityCategory::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActionCategoryController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            ActivityCategory::findOrFail($id)->update([
                'name' => $request->input('name'),
            ]);
            return redirect()
                ->action('ActivityController@admin');
        }

    }

    public function new()
    {
        return view('admin.activity_category.new', ['activity_category' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActivityCategoryController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            ActivityCategory::create([
                'name' => $request->input('name'),
            ]);
            return redirect()
                ->action('ActivityController@admin');
        }
    }

    public function destroy($id)
    {
        ActivityCategory::destroy($id);
        return redirect()
            ->action('ActivityController@admin');
    }
}
