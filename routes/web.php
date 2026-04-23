<?php

use App\Http\Controllers\FragranceController;
use App\Http\Controllers\fallcontroller;
use App\Http\Controllers\springcontroller;
use App\Http\Controllers\summercontroller;
use App\Http\Controllers\wintercontroller;
use Illuminate\Support\Facades\Route;

// ---------- Home ----------
Route::get('/', [FragranceController::class, 'index'])->name('home');
Route::get('/main', [FragranceController::class, 'index'])->name('main');

// ---------- Static pages ----------
Route::get('/notes', fn () => view('notes'))->name('notes.index');
Route::get('/collection', fn () => view('collection'))->name('collection.index');
Route::get('/season', fn () => view('season'))->name('season');

// ---------- Fragrance detail (canonical, slug-based) ----------
Route::get('/fragrance/{slug}', [FragranceController::class, 'show'])
    ->name('fragrances.show');

// ---------- Legacy detail URL — 301 redirect to canonical, preserving season/gender context ----------
Route::get('/fragrance/details/{name}/{season}/{gender}', function ($name, $season, $gender) {
    return redirect()->route('fragrances.show', [
        'slug'   => \Illuminate\Support\Str::slug($name),
        'from'   => 'seasons',
        'season' => $season,
        'gender' => $gender,
    ], 301);
});

// ---------- Season: gender pickers (must precede /{season}/{gender?}) ----------
Route::get('/spring/choose', fn () => view('fragrance.gender.genderspring'))->name('spring.choose');
Route::get('/summer/choose', fn () => view('fragrance.gender.gendersummer'))->name('summer.choose');
Route::get('/fall/choose',   fn () => view('fragrance.gender.genderfall'))->name('fall.choose');
Route::get('/winter/choose', fn () => view('fragrance.gender.genderwinter'))->name('winter.choose');

// ---------- Season collection grids ----------
Route::get('/spring/{gender?}', [springcontroller::class, 'spring'])->name('spring.index');
Route::get('/summer/{gender?}', [summercontroller::class, 'summer'])->name('summer.index');
Route::get('/fall/{gender?}',   [fallcontroller::class, 'fall'])->name('fall.index');
Route::get('/winter/{gender?}', [wintercontroller::class, 'winter'])->name('winter.index');
