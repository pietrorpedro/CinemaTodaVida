@extends('layout.master')

@section('title', 'Concluir pedido')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/views/ticketCheckout.css') }}">

    <div class="checkout w-50 p-3 mt-5 border">
      <form method="post" action="{{ route('ticketCreate', ['id' => $data['id'], 'time' => $time]) }}">
        @csrf
        <h1 class="text-center mb-4">Confirmar Pedido</h1>
        
        <div class="mb-3">
          <h3>{{ $data['title'] }}</h3>
        </div>

        <div class="mb-3">
          <h4>{{ $time }}</h4>
        </div>
      
        <button type="submit" class="btn button">Confirmar Compra</button>
      </form>
    </div>
@endsection