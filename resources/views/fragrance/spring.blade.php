@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('CSS/spring.css') }}">

    <div class="spring-page">
        <header class="spring-header">
            <h1>{{ $genderTitle }} Spring Collection</h1>
            <p>Blooming florals and fresh green notes for the season of renewal.</p>

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
                        <option value="Le Labo" {{ request('brand') == 'Le Labo' ? 'selected' : '' }}>Le Labo</option>
                        <option value="Maison Francis Kurkdjian" {{ request('brand') == 'Maison Francis Kurkdjian' ? 'selected' : '' }}>Maison Francis Kurkdjian</option>
                        <option value="Yves Saint Laurent" {{ request('brand') == 'Yves Saint Laurent' ? 'selected' : '' }}>Yves Saint Laurent</option>
                    </select>

                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Sort By</option>
                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Name: A - Z</option>
                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Name: Z - A</option>
                    </select>
                </form>
            </div>

            <a href="{{ url('/spring/choose') }}" class="back-link">← Back to Gender</a>
        </header>

        <div class="fragrance-grid">
            @foreach($fragrances as $item)
                <div class="fragrance-card"> <div class="img-wrapper">
                        <img src="{{ asset('/images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    </div>

                    <span class="brand-name">{{ $item['brand'] }}</span>
                    <h3>{{ $item['name'] }}</h3>
                    <p class="notes">{{ $item['notes'] }}</p>

                    <a href="{{ route('fragrance.show', ['name' => $item['name'], 'season' => 'spring', 'gender' => strtolower($genderTitle)]) }}" class="buy-btn">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
