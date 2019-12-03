<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\ChallengeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class ChallengeCategoryController extends Controller
{
    const VALIDATION_RULES = [
        'name' => 'required|max:255|min:3',
    ];

    public function edit($id)
    {
        return view('admin.challenge_category.edit', ['challenge_category' => ChallengeCategory::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ChallengeCategoryController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            ChallengeCategory::findOrFail($id)->update([
                'name' => $request->input('name'),
            ]);
            return redirect()
                ->action('ChallengeController@admin');
        }
    }

    public function new()
    {
        return view('admin.challenge_category.new', ['challenge_category' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('ChallengeCategoryController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            ChallengeCategory::create([
                'name' => $request->input('name'),
            ]);
            return redirect()
                ->action('ChallengeController@admin');
        }
    }

    public function destroy($id)
    {
        ChallengeCategory::destroy($id);
        return redirect()
            ->action('ChallengeController@admin');
    }
}
