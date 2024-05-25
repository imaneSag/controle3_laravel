<?php

use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthorController;

use Illuminate\Support\Facades\Route;

Route::get('livres', [LivreController::class, 'index'])->name('livres.index');
Route::get('livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('livres', [LivreController::class, 'store'])->name('livres.store');
Route::get('livres/{livre}', [LivreController::class, 'show'])->name('livres.show');  // Added show route
Route::get('livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('livres/{livre}', [LivreController::class, 'update'])->name('livres.update');
Route::delete('livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');

Route::middleware('guest')->group(function () {
    Route::get('/login', [ControllerLogin::class, 'show'])->name('login.show');
    Route::post('/login', [ControllerLogin::class, 'login'])->name('login');
});

Route::post('/logout', [ControllerLogin::class, 'logout'])->name('logout')->middleware('auth');
Route::resource('reviews', ReviewController::class);

// Author Routes
Route::resource('authors', AuthorController::class);
