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
})->name('season');


use App\Http\Controllers\summercontroller;

// This tells Laravel: When user goes to /summer, run the 'summer' function inside summercontroller
// Put this one FIRST
Route::get('/summer/choose', function () {
    return view('fragrance.gender.gendersummer');
})->name('summer.choose');

// Put the controller one SECOND
Route::get('/summer/{gender?}', [summercontroller::class, 'summer'])->name('summer.index');

use App\Http\Controllers\springcontroller;
Route::get('/spring/choose', function () {
    return view('fragrance.gender.genderspring');
})->name('spring.choose');

// The main spring collection page (goes to the controller)
Route::get('/spring/{gender?}', [springcontroller::class, 'spring'])->name('spring.index');

use App\Http\Controllers\fallcontroller;
Route::get('/fall/choose', function () {
    return view('fragrance.gender.genderfall');
})->name('fall.choose');

// The main spring collection page (goes to the controller)
Route::get('/fall/{gender?}', [fallcontroller::class, 'fall'])->name('fall.index');
use App\Http\Controllers\wintercontroller;
Route::get('/winter/choose', function () {
    return view('fragrance.gender.genderwinter');
})->name('winter.choose');

// The main spring collection page (goes to the controller)
// Details Route (Works for all seasons)
Route::get('/fragrance/details/{name}/{season}/{gender}', [springcontroller::class, 'show'])->name('fragrance.show');

// Collection Routes
Route::get('/summer/{gender}', [springcontroller::class, 'summer'])->name('summer.index');
Route::get('/fall/{gender}', [springcontroller::class, 'fall'])->name('fall.index');
Route::get('/winter/{gender}', [springcontroller::class, 'winter'])->name('winter.index');
