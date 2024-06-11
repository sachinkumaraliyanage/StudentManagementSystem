<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes(['register' => false]);

//user
Route::get('/users', [UserController::class, 'index'])->name('home');
Route::post('/users/task/active', [UserController::class, 'destroy']);
Route::post('/users/task/setpassword', [UserController::class, 'SetPassword']);
Route::post('/users/find/freeoverwrite', [UserController::class, 'FreeOverwite']);
Route::post('/users/find/returnauth', [UserController::class, 'ReturnAuth']);
//usercreate
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'store']);
//useredit
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users/{id}/edit', [UserController::class, 'update']);
//profile
Route::post('/users/task/chengepasword', [UserController::class, 'ChangePassword']);
Route::get('/users/show', [UserController::class, 'ProfileEdit']);
Route::post('/users/show', [UserController::class, 'ProfileUpdate']);


//Teacher Route
Route::get('/teachers', [App\Http\Controllers\TeacherController::class, 'index']);
Route::get('/teachers/create', [App\Http\Controllers\TeacherController::class, 'create']);
Route::post('/teachers/create', [App\Http\Controllers\TeacherController::class, 'store']);
Route::get('/teachers/{id}/edit', [App\Http\Controllers\TeacherController::class, 'edit']);
Route::post('/teachers/{id}/edit', [App\Http\Controllers\TeacherController::class, 'update']);
Route::post('/teachers/status/{status}', [App\Http\Controllers\TeacherController::class, 'destroy']);
