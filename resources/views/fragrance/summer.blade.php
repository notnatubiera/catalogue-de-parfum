@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/summer.css') }}">

    <div class="summer-page">
        <header class="summer-header">
            <h1>{{ $genderTitle }} Summer Collection</h1>
            <p>Fresh citrus and cool sea salt for the warmer months.</p>

            <div class="filter-bar">
                <form action="{{ url()->current() }}" method="GET" id="filterForm">
                    <select name="brand" onchange="this.form.submit()">
                        <option value="all">All Brands</option>
                        <option value="Byredo" {{ request('brand') == 'Byredo' ? 'selected' : '' }}>Byredo</option>
                        <option value="Calvin Klein" {{ request('brand') == 'Calvin Klein' ? 'selected' : '' }}>Calvin Klein</option>
                        <option value="Chanel" {{ request('brand') == 'Chanel' ? 'selected' : '' }}>Chanel</option>
                        <option value="Creed" {{ request('brand') == 'Creed' ? 'selected' : '' }}>Creed</option>
                        <option value="Dior" {{ request('brand') == 'Dior' ? 'selected' : '' }}>Dior</option>
                        <option value="Escentric Molecules" {{ request('brand') == 'Escentric Molecules' ? 'selected' : '' }}>Escentric Molecules</option>
                        <option value="Jo Malone" {{ request('brand') == 'Jo Malone' ? 'selected' : '' }}>Jo Malone</option>
                        <option value="Yves Saint Laurent" {{ request('brand') == 'Yves Saint Laurent' ? 'selected' : '' }}>Yves Saint Laurent</option>
                    </select>

                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Sort By</option>
                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Name: A - Z</option>
                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Name: Z - A</option>
                    </select>
                </form>
            </div>

            <a href="{{ url('/summer/choose') }}" class="back-link">← Back to Gender</a>
        </header>

        <div class="fragrance-grid">
            @foreach($fragrances as $item)
                <div class="fragrance-card">
                    <div class="img-wrapper">
                        {{-- Ensure filenames are lowercase with dashes like "wood-sage-sea-salt.jpg" --}}
                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    </div>
                    <span class="brand-name">{{ $item['brand'] }}</span>
                    <h3>{{ $item['name'] }}</h3>
                    <p class="notes">{{ $item['notes'] }}</p>
                    <a href="{{ route('fragrance.show', [
    'name' => $item['name'],
    'season' => 'summer',
    'gender' => strtolower($genderTitle)
]) }}" class="buy-btn">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
