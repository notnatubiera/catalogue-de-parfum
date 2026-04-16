<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/notes', function () {
    return view('notes'); // This looks for a file named notes.blade.php
});
Route::get('/main', function () {
    return view('welcome'); // This looks for a file named notes.blade.php
});
Route::get('/collection', function () {
    return view('collection'); // This looks for a file named notes.blade.php
});
Route::get('/season', function () {
    return view('season'); // This looks for a file named notes.blade.php
});

Route::get('/spring.index', function () {
    return view('fragrance.spring'); // This looks for a file named notes.blade.php
})->name('spring.index');
use App\Http\Controllers\summercontroller;

// This tells Laravel: When user goes to /summer, run the 'summer' function inside summercontroller
Route::get('/summer.index', [summercontroller::class, 'summer'])->name('summer.index');
