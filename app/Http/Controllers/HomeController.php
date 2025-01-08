<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard (main page).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('mainpage'); // Return the view that represents your homepage
    }
}


