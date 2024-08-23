@extends('layout.master')

@section('title', 'Detalhes do Filme')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/views/movie.css') }}">

    @if ($data)
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $data['poster_path'] }}" alt="{{ $data['title'] }}"
                        class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h1>{{ $data['title'] }}</h1>
                    <div class="info">
                        <p class="fs-5"><strong>Sinopse:</strong> {{ $data['overview'] }}</p>
                        <div class="genres d-flex gap-2">
                            @foreach($data['genres'] as $genre)
                                <p class="genre p-2 mb-2 rounded">{{ $genre['name'] }}</p>
                            @endforeach
                        </div>
                        <p class="fs-5"><strong>Data de Lançamento:</strong> {{ $data['release_date'] }}</p>
                        <p class="fs-5"><strong>Nota:</strong> {{ $data['vote_average'] }}</p>
                    </div>
                    <div class="buy-ticket">
                        <h2 class="text-center">Horários Disponíveis</h2>
                        <div class="d-flex flex-column flex-md-row mt-3 gap-1">
                            <a href="{{ route('ticketCheckout', ['id' => $data['id'], 'time' => '12:30']) }}" class="btn col-3">12:30</a>
                            <a href="{{ route('ticketCheckout', ['id' => $data['id'], 'time' => '15:00']) }}" class="btn col-3">15:00</a>
                            <a href="{{ route('ticketCheckout', ['id' => $data['id'], 'time' => '18:30']) }}" class="btn col-3">18:30</a>
                            <a href="{{ route('ticketCheckout', ['id' => $data['id'], 'time' => '20:30']) }}" class="btn col-3">20:30</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Filme não encontrado.</p>
    @endif
@endsection
