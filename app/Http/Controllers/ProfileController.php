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

    // filepath: /c:/xampp/htdocs/moonlit/app/Http/Controllers/ProfileController.php
public function updateProfilePhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Store the file in the public/images directory
    $fileName = time() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
    $path = $request->file('profile_photo')->move(public_path('images'), $fileName);

    // Save the path to the user's profile
    $user = Auth::user();
    $user->profile_photo_path = 'images/' . $fileName;
    $user->save();

    return back()->with('success', 'Profile photo updated successfully.');
}

/**public function destroy($booking_id)
{
    // Find the booking for the authenticated user
    $booking = Booking::where('user_id', auth()->id())->where('id', $booking_id)->first();

    // If booking exists, delete it
    if ($booking) {
        $booking->delete();
        return back()->with('status', 'Your booking has been canceled successfully.');
    }

    return back()->with('error', 'Booking not found or you do not have permission to cancel this booking.');
}**/
}

