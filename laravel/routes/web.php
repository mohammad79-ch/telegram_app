<?php

use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\User\ProfileController;
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

Route::get('/',[\App\Http\Controllers\IndexController::class,"index"])->name('/index');

Auth::routes();

Route::get("/user",[UserController::class,"index"])->middleware("auth")->name("user");
Route::get("/user/edit",[UserController::class,"edit"])->middleware("auth")->name("user.edit");
Route::post("/user/edit",[UserController::class,"update"])->middleware("auth")->name("user.edit.update");
Route::get("/user/@{username}",[ProfileController::class,"profile"])->name("user.profile");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
