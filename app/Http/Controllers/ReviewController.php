<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Livre;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $livres = Livre::all();
        return view('reviews.create', compact('livres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'review_text' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'livre_id' => 'required|exists:livres,id'
        ]);

        Review::create($validatedData);

        return redirect()->route('reviews.index')->with('success', 'Review added successfully.');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $livres = Livre::all();
        return view('reviews.edit', compact('review', 'livres'));
    }

    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'review_text' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'livre_id' => 'required|exists:livres,id'
        ]);

        $review->update($validatedData);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
