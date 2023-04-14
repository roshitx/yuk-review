<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'rating' => 'required|numeric',
            'review' => 'required|string|max:150',
        ]);

        // Cari movie dengan id yang diberikan
        $movie = Movie::findOrFail($id);

        // Buat review baru
        $review = new Review;
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        $review->name = auth()->user()->name; // ambil nama dari user yang sedang login
        $review->email = auth()->user()->email;
        $review->id_movie = $movie->id;
        $review->save();

        // Redirect kembali ke halaman detail movie
        return redirect()->route('detail.movies', ['id' => $movie->id])->with('success', 'Success add review!');
    }

}
