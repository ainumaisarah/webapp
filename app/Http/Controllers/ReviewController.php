<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review_text' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $customer = Auth::user(); // This will now return an instance of Customer
        $cust_id = $customer->cust_id;

        // Retrieve the room_id based on the booking list
        $booking = Booking::where('cust_id', $cust_id)
                          ->whereDate('booking_date', now()->toDateString())
                          ->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'No booking found for today.');
        }

        $review = new Review();
        $review->review_id = uniqid();
        $review->cust_id = $cust_id;
        $review->room_id = $booking->room_id;
        $review->rating = $request->input('rating');
        $review->review_text = $request->input('review_text');
        $review->review_date = now();
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
