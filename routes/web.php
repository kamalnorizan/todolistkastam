<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('users',[UserController::class,'index'])->name('users.index');
    Route::get('users/{user}',[UserController::class,'show'])->name('users.show');


Route::resource('todolist', TodoListController::class);
});
