<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{

    private $apiKey;
    private $cacheDuration = 60;

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
    }

    public function list()
    {
        $data = Cache::remember('movies', $this->cacheDuration, function () {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])
                ->withoutVerifying()
                ->get('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=pt-br&page=1&sort_by=popularity.desc');

            return $response->json()['results'];
        });

        return $data;
    }

    public function listGenres()
    {
        $genres = Cache::remember('movie_genres', $this->cacheDuration, function () {
            $genreResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])
                ->withoutVerifying()
                ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt-BR');

            return $genreResponse->json()['genres'];
        });

        return $genres;
    }

    public function details($id)
    {
        $data = Cache::remember("movie_details_{$id}", $this->cacheDuration, function () use ($id) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])
            ->withoutVerifying()
            ->get("https://api.themoviedb.org/3/movie/{$id}?language=pt-br");
    
            return $response->json();
        });
    
        $date = new \DateTime($data['release_date']);
        $data['release_date'] = $date->format('d/m/Y');
    
        $data['vote_average'] = number_format($data['vote_average'], 1);
        $data['vote_average'] = $data['vote_average'] . '/10';
    
        return $data;
    }
    
    
}
