<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;

use \App\Http\Controllers\ProjectController;

// Route::get('/', function () {
//     return view('users.list');
// });

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('users', 'store')->name('users.store');
    Route::get('/users/{user_id}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user_id}', 'update')->name('users.update');
    Route::delete('/users/{user_id}', 'delete')->name('users.delete');
    

});

Route::controller(ProjectController::class)->group(function () {
    Route::get('users/{user}/projects', 'listPro')->name('projects.list');
    Route::get('projects/{user}/create', 'createPro')->name('projects.create');
    Route::post('users/{user}/projects', 'storePro')->name('projects.store');
    Route::get('users/{user}/projects/{project}/edit', 'editPro')->name('projects.edit');
    Route::put('users/{user}/projects/{project}', 'updatePro')->name('projects.update');
    Route::delete('users/{user}/projects/{project}', 'deletePro')->name('projects.delete');
});
