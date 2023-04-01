<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailMovieController extends Controller
{
    public function index()
    {
        return view('detail', [
            'title' => 'Detail Movies',
            'active' => 'movies'
        ]);
    }
}
