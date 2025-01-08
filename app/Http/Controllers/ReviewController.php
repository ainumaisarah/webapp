<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all(); // Fetch all reviews from the database
        $averageRating = $reviews->avg('rating');
        return view('reviews', compact('reviews', 'averageRating'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'review_text' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $user = Auth::user();
        $userId = $user ? $user->id : -1;
        $userName = $user ? $user->name : 'Anonymous';

        $review = new Review();
        $review->user_id = $userId;
        $review->user_name = $userName;
        $review->rating = $request->input('rating');
        $review->review_text = $request->input('review_text');
        $review->review_date = now();
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
