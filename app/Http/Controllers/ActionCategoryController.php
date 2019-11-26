<?php

namespace App\Http\Controllers;

use App\Action;
use App\ActionCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class ActionCategoryController extends Controller
{
    const VALIDATION_RULES = [
        'name' => 'required|max:255|min:3',
    ];

    public function edit($id)
    {
        return view('admin.action_category.edit', ['action_category' => ActionCategory::findOrFail($id)]);
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
            ActionCategory::findOrFail($id)->update([
                'name' => $request->input('name'),
            ]);
            return redirect()
                ->action('ActionController@admin');
        }
    }

    public function new()
    {
        return view('admin.action_category.new', ['action_category' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ActionCategoryController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            ActionCategory::create([
                'name' => $request->input('name'),
            ]);
            return redirect()
                ->action('ActionController@admin');
        }
    }

    public function destroy($id)
    {
        ActionCategory::destroy($id);
        return redirect()
            ->action('ActionController@admin');
    }
}
