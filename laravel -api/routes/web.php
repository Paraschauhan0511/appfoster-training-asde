<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/students',[StudentController::class,'list']);

// routes/web.php

Route::get('/students', [StudentController::class, 'students.index']);
Route::resource('students', StudentController::class);
Route::get('students/{student}/projects', [StudentController::class, 'showProjects'])->name('students.projects');
Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');

Route::post('students/create', [StudentController::class, 'store'])->name('students.store');






// Route for updating the student details
Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
// Route to show the form to add a new user
// Route::get('/add-user', [UserController::class, 'create'])->name('add.user');

// // Route to handle the form submission and save the user
// Route::post('/create', [UserController::class, 'store'])->name('create.user');

// Route::get('/add-user', [UserController::class, 'create'])->name('show.user');
// Route::post('/add-user', [UserController::class, 'store'])->name('store.user');
// Route::get('/students', [UserController::class, 'index'])->name('students.index'); // Adjust this method and route if needed
// routes/web.php



Route::get('/students/{student}/projects', [ProjectController::class, 'index'])->name('students.projects');
Route::get('/students/{student}/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/students/{student}/projects', [ProjectController::class, 'showProjects'])->name('students.projects');



