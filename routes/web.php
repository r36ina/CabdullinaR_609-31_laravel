<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('hello', function () {
    return view('hello', ['title' => 'Welcome To My Site!']);
});
Route::get('/users', [UserController::class, 'index']);
Route::get('/pets', [PetController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/pet/{med_book}', [PetController::class, 'show']);

Route::get('/contract/{contract_number}', [ContractController::class, 'show']);
Route::get('/service/{name}', [ServiceController::class, 'show']);

Route::get('/services/create', [ServiceController::class, 'create']);
Route::post('/services', [ServiceController::class, 'store']);
Route::get('/services/edit/{id}', [ServiceController::class, 'edit']);
Route::post('/services/update/{id}', [ServiceController::class, 'update']);
Route::get('/services/destroy/{id}', [ServiceController::class, 'destroy']);
