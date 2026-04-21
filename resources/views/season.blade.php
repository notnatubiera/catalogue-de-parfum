@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/seasons.css') }}">
    <section class="seasons-container">
        <h1 class="page-title">Seasons</h1>
        <p class="subtitle">Discover scents curated for every time of year.</p>

        <div class="seasons-grid">
            <!-- Spring -->
            <div class="season-card">
                <div class="image-wrapper">
                    <img src="{{ asset('images/spring1.png') }}" alt="Spring">
                    <a href="{{ route('spring.index') }}" class="overlay">
                        <div class="overlay"><span>Explore Spring</span></div>
                    </a>
                </div>
                <h3>Spring</h3>
                <p>Fresh, floral, and green. Notes of lily and cherry blossom.</p>
            </div>

            <!-- Summer -->
            <div class="season-card">
                <div class="image-wrapper">
                    <img src="{{ asset('images/summer1.png') }}" alt="Summer">
                    <a href="{{ route('summer.index') }}" class="overlay">
                        <div class="overlay"><span>Explore Summer</span></div>
                    </a>
                </div>
                <h3>Summer</h3>
                <p>Bright, citrusy, and aquatic. Notes of bergamot and sea salt.</p>
            </div>

            <!-- Autumn -->
            <div class="season-card">
                <div class="image-wrapper">
                    <img src="{{ asset('images/autumn1.png') }}" alt="Autumn">
                    <a href="{{ route('fall.index') }}" class="overlay">
                        <div class="overlay"><span>Explore Fall</span></div>
                    </a>

                </div>
                <h3>Fall</h3>
                <p>Woody, spicy, and warm. Notes of amber and sandalwood.</p>
            </div>

            <!-- Winter -->
            <div class="season-card">
                <div class="image-wrapper">
                    <img src="{{ asset('images/winter1.png') }}" alt="Winter">'

                    <a href="{{ route('winter.index') }}" class="overlay">
                        <div class="overlay"><span>Explore Winter</span></div>
                    </a>
                </div>
                <h3>Winter</h3>
                <p>Deep, smoky, and gourmand. Notes of vanilla and incense.</p>
            </div>
        </div>
    </section>
@endsection
