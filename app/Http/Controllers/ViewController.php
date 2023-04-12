<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function detail($id)
    {
        $movie = Movie::find($id);
        return view('detail', [
            'title' => $movie->title,
            'active' => 'manage.movies',
            'movie' => $movie
        ]);
    }
}
