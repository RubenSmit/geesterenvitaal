<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class UserController extends Controller
{
    public function admin()
    {
        return view('admin.user.index', ['users' => User::all()]);
    }
}
