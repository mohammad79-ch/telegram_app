<?php

use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\User\Channel\ChannelController;
use App\Http\Controllers\User\Group\GroupController;
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

Auth::routes();;

Route::middleware("auth")->group(function (){
Route::get("/user",[UserController::class,"index"])->name("user");
Route::get("/user/edit",[UserController::class,"edit"])->name("user.edit");
Route::post("/user/edit",[UserController::class,"update"])->name("user.edit.update");
Route::get("user/group/create",[GroupController::class,"create"])->name("user.group.create");
Route::post("user/group/create",[GroupController::class,"store"])->name("user.group.store");
Route::post("users/{user}/groups/{group}/join",[GroupController::class,"join"])->name("user.group.join");
Route::get("user/channel/create",[ChannelController::class,"create"])->name("user.channel.create");
Route::post('user/replay/message/{user}',[UserController::class,"replay"])->name("user.replay.message");
Route::post('user/send/message/{user}',[ProfileController::class,"send"])->name("user.send.message");

});

Route::get("/user/@{username}",[ProfileController::class,"profile"])->name("user.profile");
Route::get("/user/messages",[UserController::class,"messages"])->name("user.messages");
Route::get("/user/show/single/message/{user}",[UserController::class,"singleMessage"])->name("user.show.single.message");
Route::get("user/group/index",[GroupController::class,"index"])->name("user.group.index");
Route::get("/user/@{username}/groups",[UserController::class,"groups"])->name("user.guess.groups");
Route::get("/user/groups/{group}/show",[GroupController::class,"showCurrentGroup"])->name("user.groups.show");
Route::get("/user/groups/{group}/edit",[GroupController::class,"edit"])->name("user.groups.edit");
Route::put("/user/groups/{group}/update",[GroupController::class,"update"])->name("user.group.update");



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// TODO the user can join in a group
// TODO text , group_id , user_id
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
// TODO
