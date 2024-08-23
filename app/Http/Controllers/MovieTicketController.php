<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\MovieTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;

class MovieTicketController extends Controller
{

    private $movieController;

    public function __construct() {
        $this->movieController = new MovieController();
    }

    public function create($id, $time)
    {
        if (!Auth::check()) {
            return redirect()->route('entrar')->with('message', 'Por favor, faça login para continuar.');
        }

        // Lógica de criação do pedido
        $movieTicket = MovieTicket::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $id,
            'session' => $time,
            'movie_title' => $this->movieController->details($id)['title'],
        ]);

        return redirect()->route('home')->with('success');
    }
}
