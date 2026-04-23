@extends('layout')

@push('styles')
    @vite(['resources/css/fragrance.css'])
@endpush

@section('content')
    <section class="frag-detail">
        <a href="/main" class="frag-back">&larr; Back to collection</a>

        <div class="frag-detail-grid">

            {{-- LEFT: Image --}}
            <div class="frag-detail-image">
                <img src="{{ asset($fragrance['image']) }}"
                     alt="{{ $fragrance['name'] }}"
                     onerror="this.parentElement.classList.add('no-image')">
                @if (! empty($fragrance['badge']))
                    <span class="frag-detail-badge">{{ $fragrance['badge'] }}</span>
                @endif
            </div>

            {{-- RIGHT: Info --}}
            <div class="frag-detail-info">
                <p class="frag-detail-brand">{{ $fragrance['brand'] }}</p>
                <h1 class="frag-detail-title">{{ $fragrance['name'] }}</h1>
                <p class="frag-detail-desc">{{ $fragrance['description'] }}</p>

                <div class="frag-detail-stats">
                    <div><span>Longevity</span><strong>{{ $fragrance['longevity'] }}</strong></div>
                    <div><span>Sillage</span><strong>{{ $fragrance['sillage'] }}</strong></div>
                    <div><span>Gender</span><strong>{{ $fragrance['gender'] }}</strong></div>
                    <div><span>Price</span><strong>{{ $fragrance['price'] }}</strong></div>
                </div>

                <div class="frag-detail-meta">
                    <div class="meta-row">
                        <span class="meta-label">Season</span>
                        <div class="meta-chips">
                            @foreach (['winter', 'spring', 'summer', 'fall'] as $season)
                                <span class="meta-chip {{ in_array($season, $fragrance['seasons']) ? 'on' : 'off' }}">{{ ucfirst($season) }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="meta-row">
                        <span class="meta-label">Time of Day</span>
                        <div class="meta-chips">
                            @foreach (['day', 'night'] as $t)
                                <span class="meta-chip {{ in_array($t, $fragrance['time']) ? 'on' : 'off' }}">{{ ucfirst($t) }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="meta-row">
                        <span class="meta-label">Occasions</span>
                        <div class="meta-chips">
                            @foreach ($fragrance['occasions'] as $occ)
                                <span class="meta-chip on">{{ ucfirst($occ) }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN ACCORDS GRAPH --}}
        <div class="accords-panel">
            <h2 class="accords-title">main accords</h2>
            <div class="accords-bars">
                @php
                    $widths = [100, 78, 60, 46, 34];
                @endphp
                @foreach ($fragrance['accords'] as $i => $accord)
                    @php
                        $key   = strtolower($accord);
                        $color = $colors[$key] ?? '#888';
                        $width = $widths[$i] ?? 25;
                    @endphp
                    <div class="accord-row">
                        <span class="accord-label">{{ $accord }}</span>
                        <div class="accord-track">
                            <div class="accord-bar" style="width: {{ $width }}%; background: {{ $color }};"></div>
                        </div>
                        <span class="accord-pct">{{ $width }}%</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
