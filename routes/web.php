<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');

});


Auth::routes();

Route::middleware(['auth', 'user-access:user'])->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/users', [HomeController::class, 'listUsers'])->name('admin.users');
    // DELETE
    Route::delete('/users/{id}', [HomeController::class, 'deleteUser'])->name('admin.users.delete');
    // CREATE
    Route::get('/users/create', [HomeController::class, 'createUserForm'])->name('admin.users.create');
    Route::post('/users', [HomeController::class, 'storeUser'])->name('admin.users.store');
    // UPDATE
    Route::get('/users/{id}/edit', [HomeController::class, 'editUserForm'])->name('admin.users.edit');
    Route::put('/users/{id}', [HomeController::class, 'updateUser'])->name('admin.users.update');
    // READ
    Route::get('/users/{id}', [HomeController::class, 'showUser'])->name('admin.users.show');
});

