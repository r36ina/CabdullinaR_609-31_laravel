<?php

use App\Http\Controllers\PetControllerApi;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceControllerApi;
use App\Http\Controllers\MedWorkerControllerApi;
use Illuminate\Http\Request;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/services/{id}', [ServiceControllerApi::class, 'show']);

Route::get('/medworkers', [MedWorkerControllerApi::class, 'index']);
Route::get('/medworkers/{id}', [MedWorkerControllerApi::class, 'show']);

Route::get('/pets', [PetControllerApi::class, 'index']);
Route::get('/pets/{id}', [PetControllerApi::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/services', [ServiceControllerApi::class, 'index']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
   Route::get('/logout', [AuthController::class, 'logout']);
});
