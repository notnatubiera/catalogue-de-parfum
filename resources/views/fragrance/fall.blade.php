@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/summer.css') }}">

    <div class="summer-page">
        <header class="summer-header">
            <h1>Summer Collection</h1>
            <p>Fresh citrus and cool sea salt for the warmer months.</p>

            <!-- FILTER & SORT BAR -->
            <div class="filter-bar">
                <form action="{{ url()->current() }}" method="GET" id="filterForm">
                    <select name="brand" onchange="this.form.submit()">
                        <option value="all">All Brands</option>
                        <option value="Dior" {{ request('brand') == 'Dior' ? 'selected' : '' }}>Dior</option>
                        <option value="Versace" {{ request('brand') == 'Versace' ? 'selected' : '' }}>Versace</option>
                        <option value="YSL" {{ request('brand') == 'YSL' ? 'selected' : '' }}>YSL</option>
                        <option value="JPG" {{ request('brand') == 'JPG' ? 'selected' : '' }}>Jean Paul Gaultier</option>
                    </select>

                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Sort By</option>
                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Name: A - Z</option>
                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Name: Z - A</option>
                    </select>
                </form>
            </div>

            <a href="{{ url('/fall/choose') }}" class="back-link">← Back to Gender</a>
        </header>

        <div class="fragrance-grid">
            @foreach($fragrances as $item)
                <div class="fragrance-card">
                    <div class="img-wrapper">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    </div>
                    <span class="brand-name">{{ $item['brand'] }}</span>
                    <h3>{{ $item['name'] }}</h3>
                    <p class="notes">{{ $item['notes'] }}</p>
                    <span class="price">${{ $item['price'] }}</span>
                    <button class="buy-btn">View Details</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
