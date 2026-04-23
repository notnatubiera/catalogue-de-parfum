<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;

class FragranceController extends Controller
{




    public static function accordColors(): array
    {
        return [
            'citrus'       => '#FFD54F',
            'fresh'        => '#81D4FA',
            'marine'       => '#0288D1',
            'aquatic'      => '#0288D1',
            'woody'        => '#8D6E63',
            'musky'        => '#9E9E9E',
            'amber'        => '#FFB300',
            'sweet'        => '#F48FB1',
            'vanilla'      => '#FFF3E0',
            'floral'       => '#CE93D8',
            'white floral' => '#F5F5F5',
            'fruity'       => '#FF7043',
            'green'        => '#66BB6A',
            'warm spicy'   => '#E53935',
            'fresh spicy'  => '#FB8C00',
            'aromatic'     => '#8BC34A',
            'smoky'        => '#424242',
            'leather'      => '#5D4037',
            'powdery'      => '#F8BBD0',
            'salty'        => '#4DB6AC',
            'earthy'       => '#4E342E',
            'cacao'        => '#3E2723',
        ];
    }

    public function index()
    {
        $fragrances = \App\Models\Perfume::with(['seasons', 'occasions', 'brand'])->get();
        $featured = \App\Models\Perfume::where('is_featured', true)->first() ?? $fragrances->first();

        return view('welcome', compact('fragrances', 'featured'));
        
    }

    public function show(string $slug)
    {
        $fragrance = \App\Models\Perfume::with(['brand', 'occasions', 'seasons'])
            ->where('name', 'LIKE', str_replace('-', ' ', $slug))
            ->firstOrFail();
        return view('fragrance', [
            'fragrance' => $fragrance,
            'colors'    => self::accordColors(),
        ]);
    }
}
