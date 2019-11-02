<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class PageController extends Controller
{
    public function index()
    {
        return view('page.index', ['pages' => Page::all()]);
    }

    public function show($id)
    {
        return view('page.show', ['page' => Page::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('page.edit', ['page' => Page::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:pages|max:255|min:3',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->action('PageController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            Page::findOrFail($id)
                ->update([
                    'title' => $request->input('title'),
                    'content' => $request->input('content')
                ]);
            return redirect()
                ->action('PageController@edit', ['id' => $id]);
        }

    }

    public function new()
    {
        return view('page.new', ['page' => null]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:pages|max:255|min:3',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->action('PageController@new')
                ->withErrors($validator)
                ->withInput();
        } else {
            $page = Page::create([
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);
            return redirect()
                ->action('PageController@edit', ['id' => $page->id]);
        }
    }
}
