<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show()
{
    // Fetch bookings for the authenticated user
    $bookings = \App\Models\Booking::where('user_id', auth()->id())->get();

    // Pass the bookings to the view
    return view('profile.show', compact('bookings'));
}

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('status', 'Profile updated successfully.');
    }
}

