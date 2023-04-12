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
}
