<?php

use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/jobs', [JobController::class, 'index']);


    Route::post('/logout', [UserController::class, 'logout']);

});

