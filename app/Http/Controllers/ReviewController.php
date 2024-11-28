<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        // Load only 'barber' relationship
        return Review::with('barber')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barber' => 'required|exists:barber,id_barber', 
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
            'tanggal_review' => 'required|date',
        ]);

        // Create review with validated data
        $review = Review::create($validatedData);
        return response()->json(['message' => 'Review created successfully!', 'data' => $review]);
    }

    public function show($id)
    {
        // Load only 'barber' relationship
        $review = Review::with('barber')->findOrFail($id);
        return response()->json($review);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validatedData = $request->validate([
            'id_barber' => 'sometimes|exists:barber,id_barber',
            'rating' => 'sometimes|integer|min:1|max:5',
            'komentar' => 'nullable|string',
            'tanggal_review' => 'sometimes|date',
        ]);

        // Update review with validated data
        $review->update($validatedData);
        return response()->json(['message' => 'Review updated successfully!', 'data' => $review]);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully!']);
    }
}
