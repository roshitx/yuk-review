<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScrapperController extends Controller
{
    public function scrapMovie(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imdbUrl' => 'required|url'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'You must enter a valid IMDb url');
        }

        $IMDB = new IMDBController($request->imdbUrl);
        if ($IMDB->isReady) {
            $movieData = [
                'title' => $IMDB->getTitle($bForceLocal = true),
                'genre' => $IMDB->getGenre(),
                'duration' => $IMDB->getRuntime(),
                'year' => $IMDB->getYear(),
                'synopsis' => $IMDB->getDescription(),
                'poster' => $IMDB->getPoster(),
                'trailer' => $IMDB->getTrailerAsUrl($bEmbed = true),
                'rating' => $IMDB->getRating(),
                'rating_count' => $IMDB->getRatingCount(),
            ];

            $existingMovie = Movie::where('title', $movieData['title'])->first();
            if ($existingMovie) {
                return redirect()->back()->with('error', 'Movie already exists in the database');
            }


            try {
                Movie::create($movieData);
                return redirect()->back()->with('success', 'Movie has been scrapped successfully');
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Unable to scrap ' . $request->imdbUrl);
            }
            
            
        }
    }
}
