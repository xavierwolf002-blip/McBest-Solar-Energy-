<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('is_approved', true)->latest()->paginate(10);
        return view('pages.reviews', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'service_type' => 'required|string|max:50',
            'review_text' => 'required|string',
            'location' => 'required|string|max:100',
        ]);

        Review::create(array_merge($validated, [
            'approval_status' => 'pending',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]));

        return back()->with('success', 'Review submitted successfully. It will appear once approved.');
    }

    public function getFeatured()
    {
        return Review::where('is_featured', true)->where('is_approved', true)->get();
    }

    public function markHelpful($id)
    {
        $review = Review::findOrFail($id);
        $review->increment('helpful_count');
        return back();
    }
}
