<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Exception;
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

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'duration' => 'required',
            'year' => 'required',
            'synopsis' => 'required',
            'poster' => 'required',
            'trailer' => 'required',
            'rating' => 'required',
            'rating_count' => 'required'
        ]);

        try {
            Movie::create($validated);
            return redirect()->route('manage.movies')->with('success', 'Movie added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add movie. Please try again.');
        }
    }

    public function updateView($id)
    {
        $movie = Movie::find($id);

        return view('auth.edit-movie', [
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

    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->back()->with('error', 'Movie not found.');
        }
        $movie->delete();
        return redirect()->back()->with('success', 'Movie has been deleted.');
    }

    public function movieStatistics()
    {

        $rating_count = [];

        for ($i = 1; $i <= 10; $i++) {
            $rating_count[$i] = Movie::all()->where('rating', $i)->count();
        }

        return response()->json($rating_count);
    }

}
