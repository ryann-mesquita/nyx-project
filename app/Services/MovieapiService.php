<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;

class MovieapiService{
    protected string $api_key;
    protected string $base_url;

    public function __construct(){
        $this->api_key = config('movieapi.api_key');
        $this->base_url = config('movieapi.url');
        $this->client = new Client([
            'base_uri' => $this->base_url,
            'timeout' => 2.0
        ]);
    }

    public function getMovies($movie_name = null){
        if($movie_name){
            $endpoints = $this->client->request('GET', 'search/movie?query='.$movie_name.'&api_key='.$this->api_key.'&language=pt-BR&page=1');
            $response = json_decode($endpoints->getBody()->getContents(), true);
            return $response;
        }

        $endpoints = $this->client->request('GET', 'movie/popular?api_key='.$this->api_key.'&language=pt-BR&page=1');
        $response = json_decode($endpoints->getBody()->getContents(), true);
        return $response;
    }


    public function getMovieById($id){
        $endpoints = $this->client->request('GET', 'movie/'.$id.'?api_key='.$this->api_key.'&language=pt-BR&page=1');
        $response = json_decode($endpoints->getBody()->getContents(), true);
        return $response;
    }

}
