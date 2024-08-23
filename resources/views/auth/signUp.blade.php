@extends('layout.master')
@section('title', 'Criar Conta')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/views/auth/auth.css') }}">

    <form method="POST" action="{{ route('signUpCreate') }}" class="w-75 mt-5 p-3 border">
        <h2 class="text-center">Criar Conta</h2>
    
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="name" placeholder="Digite seu nome completo" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email" value="{{ old('email') }}">
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
    
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirme sua Senha</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme a senha" name="confirmPassword">
            @error('confirmPassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="p-2 text-center mt-2 w-100">Criar Conta</button>
    </form>
    
    
@endsection
