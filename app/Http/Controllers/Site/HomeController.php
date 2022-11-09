<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MovieapiService;

class HomeController extends Controller
{
    public function index(MovieapiService $service){

        $movies = $service->getMovies()['results'];

        return view('site.index',  ['movies' => $movies]);
    }
}
