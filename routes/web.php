<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;

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
// Creates routes for different functions for shows
Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
Route::get('/shows/create', [ShowController::class, 'create'])->name('shows.create');
Route::get('/shows/{show}', [ShowController::class, 'show'])->name('shows.show');
Route::post('/shows', [ShowController::class, 'store'])->name('shows.store');
Route::put('/shows/{show}', [ShowController::class, 'update'])->name('shows.update');
Route::get('/shows/{show}/edit', [ShowController::class, 'edit'])->name('shows.edit');
Route::delete('/shows/{show}', [ShowController::class, 'destroy'])->name('shows.destroy');

require __DIR__.'/auth.php';
