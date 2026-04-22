@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/fall.css') }}">

    <div class="fall-page">
        <header class="fall-header">
            <h1>{{ $genderTitle }} Fall Collection</h1>
            <p>Warm ambers and deep woody notes for the autumn evenings.</p>

            <div class="filter-bar">
                <form action="{{ url()->current() }}" method="GET" id="filterForm">
                    <select name="brand" onchange="this.form.submit()">
                        <option value="all">All Brands</option>
                        <option value="Carolina Herrera" {{ request('brand') == 'Carolina Herrera' ? 'selected' : '' }}>Carolina Herrera</option>
                        <option value="Chanel" {{ request('brand') == 'Chanel' ? 'selected' : '' }}>Chanel</option>
                        <option value="Dior" {{ request('brand') == 'Dior' ? 'selected' : '' }}>Dior</option>
                        <option value="Escentric Molecules" {{ request('brand') == 'Escentric Molecules' ? 'selected' : '' }}>Escentric Molecules</option>
                        <option value="Lancôme" {{ request('brand') == 'Lancôme' ? 'selected' : '' }}>Lancôme</option>
                        <option value="Le Labo" {{ request('brand') == 'Le Labo' ? 'selected' : '' }}>Le Labo</option>
                        <option value="Maison Francis Kurkdjian" {{ request('brand') == 'Maison Francis Kurkdjian' ? 'selected' : '' }}>Maison Francis Kurkdjian</option>
                        <option value="Tom Ford" {{ request('brand') == 'Tom Ford' ? 'selected' : '' }}>Tom Ford</option>
                        <option value="Versace" {{ request('brand') == 'Versace' ? 'selected' : '' }}>Versace</option>
                        <option value="Yves Saint Laurent" {{ request('brand') == 'Yves Saint Laurent' ? 'selected' : '' }}>Yves Saint Laurent</option>
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
                        {{-- Ensure filenames are lowercase with dashes like "wood-sage-sea-salt.jpg" --}}
                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                    </div>
                    <span class="brand-name">{{ $item['brand'] }}</span>
                    <h3>{{ $item['name'] }}</h3>
                    <p class="notes">{{ $item['notes'] }}</p>
                    <a href="{{ route('fragrance.show', [
    'name' => $item['name'],
    'season' => 'fall',
    'gender' => strtolower($genderTitle)
]) }}" class="buy-btn">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
