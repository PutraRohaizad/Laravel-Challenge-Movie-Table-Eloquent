<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->with('category')->withAvg('ratings', 'rating')->withCount('ratings')->orderByDesc('ratings_avg_rating')
        ->take(100)->get();

        return view('home', compact('movies'));
    }
}
