<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            //'negativereview_text' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'comfort' => 'required|numeric|min:0|max:5',
            'staff' => 'required|numeric|min:0|max:5',
            'facilities' => 'required|numeric|min:0|max:5',
            'value' => 'required|numeric|min:0|max:5',
            'property_photos' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $userId = $user ? $user->id : -1;
        $userName = $user ? $user->name : 'Anonymous';

        $review = new Review();
        $review->user_id = $userId;
        $review->user_name = $userName;
        $review->rating = $request->input('rating');
        $review->comfort = $request->input('comfort');
        $review->staff = $request->input('staff');
        $review->facilities = $request->input('facilities');
        $review->value = $request->input('value');
        $review->review_text = $request->input('review_text');
        //$review->negativereview_text= $request->input ('negativereview_text');
        $review->review_date = now();

        if ($request->hasFile('property_photos')) {
            $filePath = $request->file('property_photos')->store('property_photos', 'public');
            $review->property_photos = $filePath;
        }
        $review->save();
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('edit_review', compact('review'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'review_text' => 'required|string|max:255',
        ]);

        $review = Review::findOrFail($id);
        $review->review_text = $request->input('review_text');
        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }


    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        if ($review->property_photos) {
            Storage::delete($review->property_photos);
        }
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }



}
