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
                <img src="{{ asset('storage/' . $fragrance->image) }}"
                     alt="{{ $fragrance->name }}"
                     onerror="this.parentElement.classList.add('no-image')">>
                @if (! empty($fragrance->badge))
                    <span class="frag-detail-badge">{{ $fragrance->badge }}</span>
                @endif
            </div>

            {{-- RIGHT: Info --}}
            <div class="frag-detail-info">
                <p class="frag-detail-brand">{{ $fragrance->brand->name ?? 'Brand' }}</p>
                <h1 class="frag-detail-title">{{ $fragrance->name }}</h1>
                <p class="frag-detail-desc">{{ $fragrance->description }}</p>

                <div class="frag-detail-stats">
                    <span>Longevity: <strong>{{ $fragrance->longevity ?? 'N/A' }}</strong></span>
                    <span>Sillage: <strong>{{ $fragrance->sillage ?? 'N/A' }}</strong></span>
                    <span>Gender: <strong>{{ $fragrance->gender }}</strong></span>
                    <span>Price: <strong>{{ $fragrance->price ?? 'N/A' }}</strong></span>
                </div>

                <div class="frag-detail-meta">
                    <div class="meta-row">
                        <span class="meta-label">Season</span>
                        <div class="meta-chips">
                            @php $perfumeSeasons = $fragrance->seasons->pluck('name')->map(fn($s) => strtolower($s))->toArray(); @endphp
                            @foreach ($fragrance->seasons as $season)
                                <span class="meta-chip on">{{ $season->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="meta-row">
                        <span class="meta-label">Time of Day</span>
                        <div class="meta-chips">
                            @foreach (['day', 'night'] as $time)
                                <span class="meta-chip {{ in_array($time, (array) ($fragrance->time_of_day ?? [])) ? 'on' : 'off' }}">
                                    {{ ucfirst($time) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="meta-row">
                        <span class="meta-label">Occasions</span>
                        <div class="meta-chips">
                            @forelse ($fragrance->occasions ?? [] as $occ)
                                <span class="meta-chip on">{{ $occ->name }}</span>
                            @empty
                                <span class="meta-chip off">None Specified</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
