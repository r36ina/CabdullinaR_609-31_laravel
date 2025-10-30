<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedWorkerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('hello', function () {
    return view('hello', ['title' => 'Welcome To My Site!']);
});
Route::get('/users', [UserController::class, 'index']);
Route::get('/pets', [PetController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/medworkers', [MedworkerController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/pet/{id}', [PetController::class, 'show']);
Route::get('/medworker/{id}', [MedworkerController::class, 'show']);

Route::get('/contract/{contract_number}', [ContractController::class, 'show']);
Route::get('/service/{id}', [ServiceController::class, 'show']);

Route::post('/services', [ServiceController::class, 'store']);
Route::get('/services/create', [ServiceController::class, 'create'])->middleware('auth');
Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->middleware('auth');
Route::post('/services/update/{id}', [ServiceController::class, 'update'])->middleware('auth');
Route::get('/services/destroy/{id}', [ServiceController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});

Route::get('/about', function () {
    return view('about');
});
