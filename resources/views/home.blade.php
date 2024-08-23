@extends('layout.master')
@section('title', 'Página Inicial')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/views/home.css') }}">

    <div class="home">
        {{-- {{ dd($data) }} --}}
        <div class="carousel border-top-0">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://placehold.co/1200x400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placehold.co/1200x400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placehold.co/1200x400" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Voltar</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Avançar</span>
                </button>
            </div>
        </div>

        <div class="schedule mt-4 mb-4">
            <h1 class="mb-3">Programação</h1>
            <div class="gap-3 cards">
                @if ($data)
                    @foreach($data as $movie)
                        <a href="{{ route('movieDetails', ['id' => $movie['id']]) }}">
                            <div class="card">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="card-img-top img-fluid" alt="{{ $movie['title'] }}">
                                <div class="card-body">
                                    <h5 class="card-title mb-2">{{ $movie['title'] }}</h5>
                                    <p class="card-text">{{$movie['genre_name']}} - 125m</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <p>Erro, nenhum filme encontrado</p>
                @endif
            </div>
        </div>

        <div class="combos">
            <h1 class="mb-3">Combos para melhorar seu filme</h1>
            <div class="combos-thumbnails">
                <img src="https://placehold.co/600x200" class="img-thumbnail" alt="...">
                <img src="https://placehold.co/600x200" class="img-thumbnail" alt="...">
            </div>
        </div>

    @endsection
