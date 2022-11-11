<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MovieRent;

use App\Services\MovieapiService;

class HomeController extends Controller
{
    public function index(MovieapiService $service, Request $request){

        ($request->search) ? $movie = $request->search : $movie = '';

        $movies = $service->getMovies($movie)['results'];

        return view('site.index',  ['movies' => $movies]);
    }


    public function show(MovieapiService $service, $id){

        $movie = $service->getMovieById($id);
        return view('site.show',  ['movie' => $movie]);
    }

    public function store(Request $request){
        $movie_rent = new MovieRent();
        $movie_rent->movie_id = $request->movie_id;
        $movie_rent->movie_name = $request->movie_name;
        $movie_rent->name = $request->name;
        $movie_rent->email = $request->email;

        $movie_rent->save();

        return redirect()->route('site.site')->with('mensagem', 'Aluguel realizado com sucesso!');
    }
}
