<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students',[StudentController::class,'list']);

// routes/web.php

Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
//
//Route::get('/students', [StudentController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);
Route::resource('students', StudentController::class);
Route::get('students/{student}/projects', [StudentController::class, 'showProjects'])->name('students.projects');
Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');


// Route for updating the student details
Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');