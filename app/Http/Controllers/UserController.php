<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('user.index', compact('user'));
        //return view('user.index');
    }
}
