<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends CoreInfController
{

    public function index()
    {
        $courses = $this->courseList();
        $userCount = User::count();

        return view('home', compact('courses','userCount'));
    }

    public function register()
    {   return view('register');

    }
}
