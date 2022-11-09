<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MovieapiService;

class HomeController extends Controller
{
    public function index(MovieapiService $service, Request $request){

        ($request->search) ? $movie = $request->search : $movie = '';

        $movies = $service->getMovies($movie)['results'];

        return view('site.index',  ['movies' => $movies]);
    }
}
