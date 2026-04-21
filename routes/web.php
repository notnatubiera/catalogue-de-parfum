<?php

use App\Http\Controllers\FragranceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FragranceController::class, 'index']);
Route::get('/main', [FragranceController::class, 'index']);
Route::get('/fragrance/{slug}', [FragranceController::class, 'show'])->name('fragrance.show');

Route::get('/notes', function () {
    return view('notes');
});
Route::get('/collection', function () {
    return view('collection');
});
Route::get('/season', function () {
    return view('season');
});
