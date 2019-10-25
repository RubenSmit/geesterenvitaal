<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Show the page for the given page.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('page.show', ['page' => Page::findOrFail($id)]);
    }
}
