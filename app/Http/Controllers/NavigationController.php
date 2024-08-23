<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\MovieController;

class NavigationController extends Controller
{

    private $movieController;

    public function __construct() {
        $this->movieController = new MovieController();
    }

    public function home()
    {
        $data = array_slice($this->movieController->list(), 0, 6);
        $genres = $this->movieController->listGenres();
    
        // Associando gêneros aos filmes
        foreach ($data as &$movie) {
            if (!empty($movie['genre_ids'])) {
                $genreId = $movie['genre_ids'][0];
                $genreName = collect($genres)->firstWhere('id', $genreId)['name'] ?? 'Gênero não encontrado';
                $movie['genre_name'] = $genreName;
            } else {
                $movie['genre_name'] = 'Sem gênero';
            }
        }

        return view('home', ['data' => $data]);
    }

    public function movies()
    {   
        return view('movies', ['data' => $this->movieController->list()]);
    }

    public function movieDetails($id)
    {
        return view('movieDetails', ['data' => $this->movieController->details($id)]);
    }

    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('signIn');
        }
        
        return view('profile');
    }

    public function ticketCheckout($id, $time)
    {
        if (!Auth::check()) {
            return redirect()->route('signIn');
        }
        
        $data = $this->movieController->details($id);
        return view('ticketCheckout', compact('id','time'), ['data'=> $data]);
    }
}
