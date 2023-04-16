<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home()
    {
        $movies = Movie::paginate(4);
        return view('home', [
            'title' => 'Home',
            'active' => '/',
            'movies' => $movies
        ]);
    }

    public function allMovies()
    {
        $movies = Movie::all();
        return view('movies', [
            'title' => 'Movies',
            'active' => 'movies',
            'movies' => $movies
        ]);
    }

    public function searchMovie(Request $request)
    {
        $query = $request->input('search');

        if (empty($query)) {
            $movies = Movie::all();
        } else {
            $movies = Movie::where('title', 'LIKE', "%$query%")
                        ->orWhere('genre', 'LIKE', "%$query%")
                        ->orWhere('synopsis', 'LIKE', "%$query%")
                        ->paginate(5);
            $request->session()->put('search', $query);
        }

        $search = $request->session()->get('search');
        return view('movies', [
            'title' => 'All Movies',
            'active' => 'movies',
            'movies' => $movies,
            'search' => $search,
        ]);
    }

    public function detail($id)
    {
        $movie = Movie::where('id', $id)->first();
        $reviews = Review::where('id_movie', $movie->id)->get();
        return view('detail', [
            'title' => $movie->title,
            'active' => 'movies',
            'movie' => $movie,
            'reviews' => $reviews
        ]);
    }
}
