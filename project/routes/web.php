<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Student CRUD
// Student List
Route::get('/students', [StudentController::class, 'index'])->name('student-list');
// Student Create
Route::get('/students/add', [StudentController::class, 'create'])->name('student-create');
Route::post('/students/store', [StudentController::class, 'store'])->name('student-store');
// Student View
Route::get('/students/{id}', [StudentController::class, 'show'])->name('student-view');
// Student Update
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student-edit');
Route::post('/students/{id}/edit', [StudentController::class, 'update'])->name('student-update');
// Student Delete
Route::get('/students/{id}/delete', [StudentController::class, 'destroy'])->name('student-delete');

// Course CRUD
// Course List
Route::get('/courses', [CourseController::class, 'index'])->name('course-list');
// Course Create
Route::get('/courses/add', [CourseController::class, 'create'])->name('course-create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('course-store');
// Course View
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course-view');
// Course Update
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('course-edit');
Route::post('/courses/{id}/edit', [CourseController::class, 'update'])->name('course-update');
// Course Delete
Route::get('/courses/{id}/delete', [CourseController::class, 'destroy'])->name('course-delete');