@extends('layout')

@section('content')
    <!-- Linking your NEW dedicated CSS file -->
    <link rel="stylesheet" href="{{ asset('CSS/genderfalldesign.css') }}">
    <div class="back-container">
        <a href="{{ route('season') }}">
            <button class="btn-back">
                BACK TO SEASONS
                <div class="star-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="fil0">
                        <path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.99,29.33 371.15,197.68 392.05,407.75 20.93,-210.07 184.09,-378.41 392.06,-407.75 -207.97,-29.37 -371.13,-197.7 -392.06,-407.78z"></path>
                    </svg>
                </div>
                <div class="star-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="fil0">
                        <path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.99,29.33 371.15,197.68 392.05,407.75 20.93,-210.07 184.09,-378.41 392.06,-407.75 -207.97,-29.37 -371.13,-197.7 -392.06,-407.78z"></path>
                    </svg>
                </div>
                <div class="star-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="fil0">
                        <path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.99,29.33 371.15,197.68 392.05,407.75 20.93,-210.07 184.09,-378.41 392.06,-407.75 -207.97,-29.37 -371.13,-197.7 -392.06,-407.78z"></path>
                    </svg>
                </div>
                <div class="star-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="fil0">
                        <path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.99,29.33 371.15,197.68 392.05,407.75 20.93,-210.07 184.09,-378.41 392.06,-407.75 -207.97,-29.37 -371.13,-197.7 -392.06,-407.78z"></path>
                    </svg>
                </div>
                <div class="star-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="fil0">
                        <path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.99,29.33 371.15,197.68 392.05,407.75 20.93,-210.07 184.09,-378.41 392.06,-407.75 -207.97,-29.37 -371.13,-197.7 -392.06,-407.78z"></path>
                    </svg>
                </div>
                <div class="star-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 784.11 815.53" class="fil0">
                        <path d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.99,29.33 371.15,197.68 392.05,407.75 20.93,-210.07 184.09,-378.41 392.06,-407.75 -207.97,-29.37 -371.13,-197.7 -392.06,-407.78z"></path>
                    </svg>
                </div>
            </button>
        </a>
    </div>
    <div class="fall-selection-wrapper">
        <div class="selection-header">
            <span class="subtitle">FALL</span>
            <h1>Choose Your Essence</h1>
            <p>Find the perfect scent for a cool and cozy weather.</p>
        </div>

        <div class="gender-options-container">
            <!-- MEN -->
            <a href="{{ route('summer.index', ['gender' => 'men']) }}" class="option-card">
                <div class="image-box">
                    <img src="{{ asset('images/male.jpg') }}" alt="Male">
                </div>
                <div class="card-info">
                    <h2>FOR HIM</h2>
                    <span class="btn-discover">Discover &rarr;</span>
                </div>
            </a>

            <!-- WOMEN -->
            <a href="{{ route('summer.index', ['gender' => 'women']) }}" class="option-card">
                <div class="image-box">
                    <img src="{{ asset('images/female.jpg') }}" alt="Women">
                </div>
                <div class="card-info">
                    <h2>FOR HER</h2>
                    <span class="btn-discover">Discover &rarr;</span>
                </div>
            </a>


        </div>

    </div>
@endsection
