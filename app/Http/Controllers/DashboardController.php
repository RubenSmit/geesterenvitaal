<?php

namespace App\Http\Controllers;

use App\Action;
use App\Activity;
use App\Challenge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index', [
            'challenges' => Challenge::inRandomOrder()->take(3)->get(),
            'actions' => Action::inRandomOrder()->take(2)->get(),
            'activities' => Activity::upcoming()->take(6)->get()
        ]);
    }
}
