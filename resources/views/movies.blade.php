@extends('layout.master')
@section('title', 'Filmes em Cartaz')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/views/movies.css') }}">

    <h1>Filmes em cartaz</h1>
    <div class="gap-3 cards">
        @if ($data)
            @foreach($data as $movie)
                <a href="{{ route('movieDetails', ['id' => $movie['id']]) }}">
                    <div class="card">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $movie['title'] }}</h5>
                            <p class="card-text">Ação - 125m</p>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <p>Erro, nenhum filme encontrado</p>
        @endif
    </div>
@endsection