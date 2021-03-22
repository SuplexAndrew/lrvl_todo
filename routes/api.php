<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\MainController;
Route::post('/up', [MainController::class, 'UpTaskStatus']);
Route::get('/tasks', [MainController::class, 'GetTodos']);
Route::post('/edit', [MainController::class, 'EditTask']);
Route::post('/create', [MainController::class, 'CreateTask']);

use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'GetUsers']);
Route::post('/login', [UserController::class, 'Login']);
