@extends('layout')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { opacity: 0; animation: fadeUp 600ms cubic-bezier(0.4,0,0.2,1) forwards; }
        .back-link { position: relative; display: inline-block; }
        .back-link::after {
            content: ''; position: absolute; bottom: -1px; left: 0;
            width: 0; height: 1px; background: #1a1a1a;
            transition: width 200ms ease;
        }
        .back-link:hover::after { width: 100%; }
    </style>
@endpush

@section('content')
    @php
        // Palette-specific accord colours, keyed on normalised accord name.
        $paletteAccords = [
            'amber'       => '#D4A017', 'ambery' => '#D4A017',
            'sweet'       => '#E8A0BF',
            'woody'       => '#8B6F47', 'wood'   => '#8B6F47',
            'warm spicy'  => '#C0392B', 'spicy'  => '#C0392B',
            'musky'       => '#95A5A6', 'musk'   => '#95A5A6',
            'floral'      => '#C39BD3', 'flower' => '#C39BD3',
            'fresh'       => '#7FB3D3',
            'citrus'      => '#F4D03F',
            'green'       => '#82B74B', 'herbal' => '#82B74B',
            'aromatic'    => '#7EC8A4',
            'leather'     => '#A0785A',
            'smoky'       => '#6B6B6B', 'smoke'  => '#6B6B6B',
        ];
        $widths     = [100, 78, 60, 46, 34];
        $playfair   = "font-family:'Playfair Display', Georgia, serif;";
        $fromSeason = request('from') === 'seasons' && request('season') && request('gender');
    @endphp

    <section class="bg-[#F5EFE6] min-h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-16 max-w-[1400px] mx-auto">

            {{-- LEFT: atmospheric image column --}}
            <div class="relative h-[60vw] max-h-[400px] lg:h-screen lg:max-h-none lg:sticky lg:top-0 flex items-center justify-center overflow-hidden"
                 style="background: radial-gradient(ellipse at 60% 50%, #ede8df 0%, #F5EFE6 100%);">

                @if (! empty($fragrance['badge']))
                    <span class="absolute top-6 right-6 border border-[#8B7355] text-[#8B7355] text-[9px] tracking-[0.3em] uppercase px-3 py-1">
                        {{ $fragrance['badge'] }}
                    </span>
                @endif

                <img src="{{ asset($fragrance['image']) }}"
                     alt="{{ $fragrance['name'] }}"
                     class="max-w-[70%] max-h-[75%] object-contain"
                     style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.10));">
            </div>

            {{-- RIGHT: information column --}}
            <div class="px-6 sm:px-10 lg:pr-16 lg:pl-0 py-12 lg:py-20">

                {{-- a) Back navigation --}}
                <div class="fade-up" style="animation-delay: 0ms;">
                    @if ($fromSeason)
                        <a href="{{ url('/' . strtolower(request('season')) . '/' . strtolower(request('gender'))) }}"
                           class="back-link text-[9px] tracking-[0.25em] uppercase text-[#8B7355] hover:text-[#1a1a1a] transition-colors">
                            &larr; Return to {{ strtoupper(request('gender')) }} {{ strtoupper(request('season')) }} Collection
                        </a>
                    @else
                        <a href="{{ route('main') }}"
                           class="back-link text-[9px] tracking-[0.25em] uppercase text-[#8B7355] hover:text-[#1a1a1a] transition-colors">
                            &larr; Back to Catalogue
                        </a>
                    @endif
                </div>

                {{-- b) Brand --}}
                <p class="fade-up text-[11px] tracking-[0.35em] uppercase text-[#8B7355] mt-8 mb-2"
                   style="animation-delay: 80ms;">
                    {{ $fragrance['brand'] }}
                </p>

                {{-- c) Fragrance name --}}
                <h1 class="fade-up italic text-[40px] lg:text-[64px] leading-[1.1] font-normal text-[#1a1a1a]"
                    style="{{ $playfair }} animation-delay: 160ms;">
                    {{ $fragrance['name'] }}
                </h1>

                {{-- d) Description --}}
                @if (! empty($fragrance['description']))
                    <p class="fade-up mt-4 mb-6 text-[15px] text-[#666] leading-relaxed font-light max-w-[420px]"
                       style="animation-delay: 240ms;">
                        {{ $fragrance['description'] }}
                    </p>
                @endif

                {{-- e/f/g) Divider + metadata grid + divider --}}
                <div class="fade-up" style="animation-delay: 360ms;">
                    <div class="border-t border-[#e8ddd0] my-6"></div>

                    <div class="grid grid-cols-2 gap-x-8 gap-y-5">
                        <div>
                            <p class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] mb-1">Longevity</p>
                            <p class="text-[18px] font-normal text-[#1a1a1a]" style="{{ $playfair }}">{{ $fragrance['longevity'] }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] mb-1">Sillage</p>
                            <p class="text-[18px] font-normal text-[#1a1a1a]" style="{{ $playfair }}">{{ $fragrance['sillage'] }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] mb-1">Gender</p>
                            <p class="text-[18px] font-normal text-[#1a1a1a]" style="{{ $playfair }}">{{ ucfirst($fragrance['gender']) }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] mb-1">Price</p>
                            <p class="text-[18px] font-normal text-[#1a1a1a]" style="{{ $playfair }}">{{ $fragrance['price'] }}</p>
                        </div>
                    </div>

                    <div class="border-t border-[#e8ddd0] my-6"></div>
                </div>

                {{-- h) Badges: Season / Time of Day / Occasions --}}
                <div class="fade-up flex flex-col gap-4" style="animation-delay: 480ms;">
                    {{-- Season --}}
                    <div class="flex items-start gap-2">
                        <span class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] w-28 shrink-0 pt-1">Season</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['winter', 'spring', 'summer', 'fall'] as $s)
                                @if (in_array($s, $fragrance['seasons']))
                                    <span class="bg-[#1a1a1a] text-white text-[9px] tracking-[0.2em] uppercase px-3 py-[5px]">{{ $s }}</span>
                                @else
                                    <span class="border border-[#c8bfb0] text-[#b0a898] text-[9px] tracking-[0.2em] uppercase px-3 py-[5px]">{{ $s }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Time of Day --}}
                    <div class="flex items-start gap-2">
                        <span class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] w-28 shrink-0 pt-1">Time of Day</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['day', 'night'] as $t)
                                @if (in_array($t, $fragrance['time']))
                                    <span class="bg-[#1a1a1a] text-white text-[9px] tracking-[0.2em] uppercase px-3 py-[5px]">{{ $t }}</span>
                                @else
                                    <span class="border border-[#c8bfb0] text-[#b0a898] text-[9px] tracking-[0.2em] uppercase px-3 py-[5px]">{{ $t }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Occasions (data = active list only) --}}
                    <div class="flex items-start gap-2">
                        <span class="text-[9px] tracking-[0.25em] uppercase text-[#8B7355] w-28 shrink-0 pt-1">Occasions</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($fragrance['occasions'] as $occ)
                                <span class="bg-[#1a1a1a] text-white text-[9px] tracking-[0.2em] uppercase px-3 py-[5px]">{{ $occ }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Accords: use the CSS classes so hover effects work --}}
                <div class="fade-up" style="animation-delay: 600ms;">
                    <div class="border-t border-[#e8ddd0] my-8"></div>
                    <p class="text-[9px] tracking-[0.35em] uppercase text-[#8B7355] mb-8">Main Accords</p>

                    <div class="accords-bars">
                        @foreach ($fragrance['accords'] as $i => $accord)
                            @php
                                $key   = strtolower(trim($accord));
                                $color = $paletteAccords[$key] ?? '#8B7355';
                                $width = $widths[$i] ?? 22;
                            @endphp
                            <div class="accord-row" style="--accord-c: {{ $color }}; --accord-w: {{ $width }}%; --i: {{ $i }};">
                                <span class="accord-label">{{ $accord }}</span>
                                <div class="accord-track">
                                    <div class="accord-bar"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
