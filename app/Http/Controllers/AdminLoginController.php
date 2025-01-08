<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('auth.admin-login');  // Return the admin login view (you'll create this view)
    }

    // Handle the admin login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the admin in
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');  // Redirect to the admin dashboard
        }

        // If login fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }
}
