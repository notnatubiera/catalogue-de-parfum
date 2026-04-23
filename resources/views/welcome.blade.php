@extends('layout')

@push('styles')
    @vite(['resources/css/home.css', 'resources/css/FilterBar.css'])
@endpush

@section('content')
    <style>
        .hero {
            background-image: url('{{ asset("storage/" . $featured->hero_image) }}') !important;
        }
    </style>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="hero-label">Featured Fragrance</p>
            <h1 class="hero-title">{{ $featured->name }}</h1>
            <p class="hero-desc">{{ $featured->description   }}</p>
            <a href="{{ route('fragrance.show', Str::slug($featured->name)) }}" class="hero-btn">View Details</a>
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
                <label><input type="checkbox" value="Daily"> Daily</label>
                <label><input type="checkbox" value="Office"> Office</label>
                <label><input type="checkbox" value="Date"> Date</label>
                <label><input type="checkbox" value="Sport"> Sport</label>
                <label><input type="checkbox" value="Formal"> Formal</label>
            </div>

            <p class="filter-label">Season</p>
            <div data-group="season">
                <label><input type="checkbox" value="Winter"> Winter</label>
                <label><input type="checkbox" value="Summer"> Summer</label>
                <label><input type="checkbox" value="Spring"> Spring</label>
                <label><input type="checkbox" value="Fall"> Fall</label>
            </div>

            <p class="filter-label">Gender</p>
            <div data-group="gender">
                <label><input type="checkbox" value="Masculine"> Masculine</label>
                <label><input type="checkbox" value="Feminine"> Feminine</label>
                <label><input type="checkbox" value="Unisex"> Unisex</label>
            </div>
        </div>

        {{-- COLLECTION GRID --}}
        <div class="collection-main">
            <div class="collection-header">
                <h2 class="collection-title">The Collection</h2>
                <span class="collection-count">Showing <span
                        id="fragCount">{{ count($fragrances) }}</span> fragrances</span>
            </div>

            <div class="collection-grid" id="collectionGrid">
                @foreach ($fragrances as $fragrance)
                    <a href="{{ route('fragrance.show', \Illuminate\Support\Str::slug($fragrance->name)) }}"
                       class="frag-card"
                       data-name="{{ strtolower($fragrance->name) }}"
                       {{-- Fix: use brand name, not the whole object --}}
                       data-brand="{{ strtolower($fragrance->brand?->name ?? '') }}"
                       data-gender="{{ strtolower($fragrance->gender ?? '') }}"
                       data-seasons="{{ $fragrance->seasons->pluck('name')->map(fn($s) => strtolower($s))->implode(',') }}"
                       data-occasions="{{ $fragrance->occasions?->pluck('name')->map(fn($o) => strtolower($o))->implode(',') ?? '' }}"
                    >>
                        <div class="frag-image-wrap">
                            <img src="{{ asset('storage/' . $fragrance->image) }}"
                                 alt="{{ $fragrance->name }}"
                                 onerror="this.style.visibility='hidden'">
                            @if (! empty($fragrance->badge))
                                <span class="frag-detail-badge">{{ $fragrance->badge }}</span>
                            @endif
                        </div>
                        <div class="frag-info">
                            <p class="frag-name">{{ $fragrance['name'] }}</p>
                            <p class="frag-brand">{{ $fragrance->brand?->name ?? 'Unknown Brand' }}</p>
                            <div class="frag-stats">
                                <span>LONGEVITY: <strong>{{ $fragrance->longevity ?? 'N/A' }}</strong></span>
                                <span>SILLAGE: <strong>{{ $fragrance->sillage ?? 'N/A' }}</strong></span>
                                <span>GENDER: <strong>{{ $fragrance->gender }}</strong></span>
                                <span>PRICE: <strong>{{ $fragrance->price ?? 'N/A' }}</strong></span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <p id="noResults" class="no-results" hidden>No fragrances match your search.</p>
        </div>

    </div>

@endsection
