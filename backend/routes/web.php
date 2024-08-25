<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TodosController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function () {
    Route::get('todos', [TodosController::class, 'index']);
    Route::post('todos', [TodosController::class, 'store']);
    Route::delete('todos/{id}', [TodosController::class, 'destroy']);
});
