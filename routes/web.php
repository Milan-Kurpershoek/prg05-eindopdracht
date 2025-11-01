<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('books/show', [BookController::class, 'show']);

Route::resource('books',BookController::class);

//Route::resource('books',BookController::class)->only(['index', 'show']);
//Route::resource('books',BookController::class)->except(['index', 'show'])->middleware(['auth', 'can:edit-book,book']);

//Route::get('/search', [BookController::class, 'search'])->name('books.search');

Route::get('/search', [BookController::class, 'search']);
Route::get('/filter', [BookController::class, 'filter']);

Route::get('/admin', [BookController::class, 'admin']);

Route::patch('/books/{book}/status', [BookController::class, 'status'])->name('books.status');
