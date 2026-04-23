@extends('layout')

@push('styles')
    @vite(['resources/css/home.css', 'resources/css/FilterBar.css'])
@endpush

@section('content')
    <style>
        .hero {
            background-image: url('{{ asset($featured['hero_image'] ?? $featured['image']) }}') !important;
        }
    </style>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="hero-label">Featured Fragrance</p>
            <h1 class="hero-title">{{ $featured['name'] }}</h1>
            <p class="hero-desc">{{ $featured['description'] }}</p>
            <a href="{{ route('fragrances.show', $featured['slug']) }}" class="hero-btn">View Details</a>
        </div>
    </section>

    {{-- COLLECTION SECTION --}}
    <div class="collection-wrapper">

        {{-- FILTER SIDEBAR --}}
        <div class="filter-sidebar">
            <div class="filter-top">
                <p class="filter-title">Filter By</p>
                <span class="clear-all" onclick="clearAllFilters()">Clear</span>
            </div>

            <p class="filter-label">Occasions</p>
            <div data-group="occasion">
                <label><input type="checkbox" value="daily"> Daily</label>
                <label><input type="checkbox" value="office"> Office</label>
                <label><input type="checkbox" value="date"> Date</label>
                <label><input type="checkbox" value="sport"> Sport</label>
                <label><input type="checkbox" value="formal"> Formal</label>
            </div>

            <p class="filter-label">Season</p>
            <div data-group="season">
                <label><input type="checkbox" value="winter"> Winter</label>
                <label><input type="checkbox" value="summer"> Summer</label>
                <label><input type="checkbox" value="spring"> Spring</label>
                <label><input type="checkbox" value="fall"> Fall</label>
            </div>

            <p class="filter-label">Gender</p>
            <div data-group="gender">
                <label><input type="checkbox" value="masculine"> Masculine</label>
                <label><input type="checkbox" value="feminine"> Feminine</label>
                <label><input type="checkbox" value="unisex"> Unisex</label>
            </div>
        </div>

        {{-- COLLECTION GRID --}}
        <div class="collection-main">
            <div class="collection-header">
                <h2 class="collection-title">The Collection</h2>
                <span class="collection-count">Showing <span id="fragCount">{{ count($fragrances) }}</span> fragrances</span>
            </div>

            <div class="collection-grid" id="collectionGrid">
                @foreach ($fragrances as $frag)
                    <a href="{{ route('fragrances.show', $frag['slug']) }}"
                       class="frag-card"
                       data-name="{{ strtolower($frag['name']) }}"
                       data-brand="{{ strtolower($frag['brand']) }}"
                       data-gender="{{ strtolower($frag['gender']) }}"
                       data-seasons="{{ implode(',', $frag['seasons']) }}"
                       data-occasions="{{ implode(',', $frag['occasions']) }}">
                        <div class="frag-image-wrap">
                            <img src="{{ asset($frag['image']) }}" alt="{{ $frag['name'] }}" onerror="this.style.visibility='hidden'">
                            @if (! empty($frag['badge']))
                                <span class="frag-badge">{{ $frag['badge'] }}</span>
                            @endif
                        </div>
                        <div class="frag-info">
                            <p class="frag-name">{{ $frag['name'] }}</p>
                            <p class="frag-brand">{{ $frag['brand'] }}</p>
                            <div class="frag-stats">
                                <span>LONGEVITY: <strong>{{ $frag['longevity'] }}</strong></span>
                                <span>SILLAGE: <strong>{{ $frag['sillage'] }}</strong></span>
                                <span>GENDER: <strong>{{ $frag['gender'] }}</strong></span>
                                <span>PRICE: <strong>{{ $frag['price'] }}</strong></span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <p id="noResults" class="no-results" hidden>No fragrances match your search.</p>
        </div>

    </div>

@endsection
