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

    public function getMovies(){
        $response = $this->client->request('GET', 'movie/popular?api_key='.$this->api_key.'&language=en-US&page=1');
        $endpoints = json_decode($response->getBody()->getContents(), true);
        return $endpoints;
    }
}
