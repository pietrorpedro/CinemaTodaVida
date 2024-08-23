@extends('layout.master')

@section('title', 'Perfil')

@section('content')
    <h1>Perfil</h1>

    @auth
        <div class="profile border p-4">
            <h1>{{ Auth::user()->full_name }}</h1>
            <p>{{ Auth::user()->email }}</p>
            <a href="{{ route('logout') }}" class="btn btn-danger">Sair</a>
    
            <h2 class="mt-4">Meus Filmes:</h2>
            <div class="row gap-3">
                @foreach (Auth::user()->movieTickets as $ticket)
                    <div class="card col-12 col-md">
                        <h5 class="card-header">Ingresso</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->movie_title }}</h5>
                            <p class="card-text">{{ $ticket->session }}</p>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    @endauth
@endsection

