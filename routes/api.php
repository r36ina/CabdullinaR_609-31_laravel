<?php

use App\Http\Controllers\PetControllerApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceControllerApi;
use App\Http\Controllers\MedWorkerControllerApi;

Route::get('/services', [ServiceControllerApi::class, 'index']);
Route::get('/services/{id}', [ServiceControllerApi::class, 'show']);

Route::get('/medworkers', [MedWorkerControllerApi::class, 'index']);
Route::get('/medworkers/{id}', [MedWorkerControllerApi::class, 'show']);

Route::get('/pets', [PetControllerApi::class, 'index']);
Route::get('/pets/{id}', [PetControllerApi::class, 'show']);
