@extends('layout')

@section('content')
    {{-- Dynamically load CSS based on the season (spring, summer, fall, winter) --}}
    <link rel="stylesheet" href="{{ asset('CSS/' . $season . 'details.css') }}">

    <div class="details-page">
        <div class="details-wrapper">

            {{-- Left Side: Image --}}
            <div class="image-section">
                <img src="{{ asset('/images/' . $fragrance['image']) }}" alt="{{ $fragrance['name'] }}">
            </div>

            {{-- Right Side: Info --}}
            <div class="info-section">
                <span class="brand-tag">{{ $fragrance['brand'] }}</span>
                <h1>{{ $fragrance['name'] }}</h1>

                <div class="stats-grid">
                    <div class="stat"><span>Longevity</span><strong>{{ $fragrance['longevity'] }}</strong></div>
                    <div class="stat"><span>Sillage</span><strong>{{ $fragrance['sillage'] }}</strong></div>
                    <div class="stat"><span>Price Range</span><strong>{{ $fragrance['price'] }}</strong></div>
                    <div class="stat"><span>Gender</span><strong>{{ $fragrance['gender'] }}</strong></div>
                </div>

                <div class="notes-box">
                    <h3>Main Accords</h3>
                    <p>{{ $fragrance['notes'] }}</p>
                </div>

                {{-- The Graph Section --}}
                <div class="notes-graph-container">
                    <div class="accord-bars">
                        @foreach($notesArray as $index => $note)
                            <div class="accord-item">
                                <div class="accord-label">
                                    <span>{{ trim($note) }}</span>
                                </div>
                                <div class="bar-wrapper">
                                    {{-- Bars get progressively smaller for a nice aesthetic --}}
                                    <div class="bar-fill" style="width: {{ max(100 - ($index * 15), 20) }}%;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Footer: Return Link --}}
                <div class="return-container" style="margin-top: 40px;">
                    <a href="{{ url('/' . $season . '/' . $gender) }}" class="back-btn" style="text-decoration: none;">
                        ← Return to {{ ucfirst($gender) }} {{ ucfirst($season) }} Collection
                    </a>
                </div>
            </div> {{-- End Info Section --}}

        </div> {{-- End Wrapper --}}
    </div> {{-- End Page --}}
@endsection
