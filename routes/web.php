<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieTicketController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;


// Navigation
Route::get('/', [NavigationController::class, 'home'])->name('home');
Route::get('/filmes', [NavigationController::class, 'movies'])->name('movies');
Route::get('/filme/{id}', [NavigationController::class,'movieDetails'])->name('movieDetails');
Route::get('/perfil', [NavigationController::class,'profile'])->name('profile');

// Auth
Route::get('/criar-conta', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/criar-conta', [AuthController::class,'create'])->name('signUpCreate');
Route::get('/entrar', [AuthController::class,'signIn'])->name('signIn');
Route::post('/entrar', [AuthController::class,'login'])->name('signInLogin');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

// Ticket
Route::get('/pedido/{id}/{time}', [NavigationController::class, 'ticketCheckout'])->name('ticketCheckout');
Route::post('/pedido/{id}/{time}', [MovieTicketController::class, 'create'])->name('ticketCreate');
