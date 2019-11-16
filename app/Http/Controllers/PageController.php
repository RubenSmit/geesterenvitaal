<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class PageController extends Controller
{
    const VALIDATION_RULES = [
        'title' => 'required|max:255|min:3',
        'subtitle' => 'required|max:255|min:3',
        'content' => 'required|min:10',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function admin()
    {
        return view('admin.page.index', ['pages' => Page::all()]);
    }

    public function show($id)
    {
        return view('page.show', ['page' => Page::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('admin.page.edit', ['page' => Page::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('PageController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            $page = Page::findOrFail($id);
            $path = $page->image_url;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            $page->update([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'image_url' => $path,
            ]);
            return redirect()
                ->action('PageController@admin');
        }

    }

    public function new()
    {
        return view('admin.page.new', ['page' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), self::VALIDATION_RULES);

        if ($validator->fails()) {
            return redirect()
                ->action('PageController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', ['disk' => 'public']);
            }

            Page::create([
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'content' => $request->input('content'),
                'image_url' => $path,
            ]);
            return redirect()
                ->action('PageController@admin');
        }
    }

    public function destroy($id)
    {
        Page::destroy($id);
        return redirect()
            ->action('PageController@admin');
    }
}
