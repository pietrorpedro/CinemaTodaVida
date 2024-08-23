@extends('layout.master')
@section('title', 'Entrar')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/views/auth/auth.css') }}">

    <form method="POST" action="{{ route('signInLogin') }}" class="w-75 mt-5 p-3 border">
        <h2 class="text-center">Entrar</h2>

        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email"
                value="{{ old('email') }}">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password">
            @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="p-2 text-center mt-2 w-100">Entrar</button>
    </form>
@endsection
