@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/summer.css') }}">
    <div class="summer-page">
        <header class="summer-header">
            <h1>Summer Collection</h1>
            <p>Fresh citrus and cool sea salt for the warmer months.</p>
            <a href="{{ url('/season') }}" class="back-link">← Back to Seasons</a>
        </header>

        <div class="fragrance-grid">
            <div class="fragrance-card">
                <div class="img-wrapper">
                    <img src="{{ asset('images/perfume1.jpg') }}" alt="Citrus Breeze">
                </div>
                <h3>Citrus Breeze</h3>
                <p class="notes">Bergamot, Lemon, Neroli</p>
                <span class="price">$120</span>
                <button class="buy-btn">View Details</button>
            </div>

            <!-- Repeat for more products... -->
        </div>
    </div>

@endsection
