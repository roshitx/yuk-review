<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {

        $validatedData = $request->validate([
            'captcha' => 'required|captcha',
            'rating' => 'required|numeric',
            'review' => 'required|string|min:5|max:150',
        ]);


        $movie = Movie::findOrFail($id);


        $review = new Review;
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        $review->name = auth()->user()->name;
        $review->email = auth()->user()->email;
        $review->id_movie = $movie->id;
        $review->save();

        return redirect()->route('detail.movies', ['id' => $movie->id])->with('success', 'Success add review!');
    }
}
