<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoListController;

// DB::listen(function ($event) {
//     dump($event->sql);
// });

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::get('todolist', [TodoListController::class, 'index'])->name('todolist.index');
    Route::post('todolist', [TodoListController::class, 'index'])->name('todolist.indexsearch');

});
