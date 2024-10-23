<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Api\ProjectController as ApiProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// API routes for users
Route::controller(ApiUserController::class)->group(function () {
    Route::get('/users', 'index')->name('api.users.index'); 
    Route::post('/users', 'store')->name('api.users.store'); 
    Route::get('/users/{user_id}', 'show')->name('api.users.show'); 
    Route::put('/users/{user_id}', 'update')->name('api.users.update'); 
    Route::delete('/users/{user_id}', 'delete')->name('api.users.delete'); 
});

// API routes for projects
Route::controller(ApiProjectController::class)->group(function () {
    Route::get('/users/{user_id}/projects', 'index')->name('api.projects.list'); 
    Route::post('/users/{user_id}/projects', 'store')->name('api.projects.store'); 
    Route::get('/users/{user_id}/projects/{project_id}', 'show')->name('api.projects.show'); 
    Route::put('/users/{user_id}/projects/{project_id}', 'update')->name('api.projects.update'); 
    Route::delete('/users/{user_id}/projects/{project_id}', 'delete')->name('api.projects.delete'); 
});
