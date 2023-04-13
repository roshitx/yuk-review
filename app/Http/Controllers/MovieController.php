<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function view()
    {
        $movies = Movie::all();
        return view('auth.movies', compact('movies'))
            ->with('title', 'Manage Movies')
            ->with('active', 'manage.movies');
    }
    public function updateView($id)
    {
        $movie = Movie::find($id);

        return view('auth.edit', [
            'title' => 'Edit Movies',
            'active' => 'Edit',
            'movie' => $movie
        ]);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movie.edit', ['id' => $id])->with('error', 'Movie not found!');
        }

        $movieData = [
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'duration' => $request->input('duration'),
            'year' => $request->input('year'),
            'synopsis' => $request->input('synopsis'),
            'poster' => $request->input('poster'),
            'trailer' => $request->input('trailer'),
            'rating' => $request->input('rating'),
        ];

        if ($movie->update($movieData)) {
            return redirect()->route('movie.edit', ['id' => $id])->with('success', 'Movie updated successfully.');
        } else {
            return redirect()->route('movie.edit', ['id' => $id])->with('error', 'Failed to update movie.');
        }
    }
}
