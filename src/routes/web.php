<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/create', [TaskController::class, 'create']);

Route::post('/create', [TaskController::class, 'store']);

Route::get('/list', [TaskController::class, 'index']);

Route::get('/edit/{id}', [TaskController::class, 'edit']);

Route::post('/update/{id}', [TaskController::class, 'update']);

Route::post('/delete/{id}', [TaskController::class, 'destroy']);