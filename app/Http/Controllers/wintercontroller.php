<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class wintercontroller extends Controller
{
    // Consolidated data at the class level
    private $allFragrances = [
        ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'FRESH SPICY, AMBER, CITRUS', 'price' => '$$$', 'image' => 'sauvage.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'notes' => 'CITRUS, WOODY, FRESH', 'price' => '$$$$', 'image' => 'bleu_chanel.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
        ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'FRUITY, SMOKY, FRESH', 'price' => '$$$$$', 'image' => 'creed_aventus.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Eros', 'brand' => 'Versace', 'gender' => 'men', 'notes' => 'VANILLA, FRESH, SWEET', 'price' => '$$', 'image' => 'eros.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'La Vie Est Belle', 'brand' => 'Lancôme', 'gender' => 'women', 'notes' => 'SWEET, VANILLA, POWDERY', 'price' => '$$$', 'image' => 'la-vie-est-belle.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
        ['name' => 'Good Girl', 'brand' => 'Carolina Herrera', 'gender' => 'women', 'notes' => 'SWEET, WHITE FLORAL, CACAO', 'price' => '$$$', 'image' => 'goodgirl.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Libre', 'brand' => 'YSL', 'gender' => 'women', 'notes' => 'WHITE FLORAL, VANILLA, AROMATIC', 'price' => '$$$', 'image' => 'libre.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Alien', 'brand' => 'Mugler', 'gender' => 'women', 'notes' => 'WHITE FLORAL, AMBER, WOODY', 'price' => '$$$', 'image' => 'alien.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Baccarat Rouge 540', 'brand' => 'MFK', 'gender' => 'unisex', 'notes' => 'AMBER, SWEET, WOODY', 'price' => '$$$$$', 'image' => 'baccarat_540.jpg', 'longevity' => 'Very Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Black Orchid', 'brand' => 'Tom Ford', 'gender' => 'unisex', 'notes' => 'EARTHY, FLORAL, WOODY', 'price' => '$$$$', 'image' => 'black_orchid.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Santal 33', 'brand' => 'Le Labo', 'gender' => 'unisex', 'notes' => 'WOODY, LEATHER, SMOKY', 'price' => '$$$$$', 'image' => 'santal_33.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
        ['name' => 'Molecule 01', 'brand' => 'Escentric Molecules', 'gender' => 'unisex', 'notes' => 'WOODY, MUSKY, AMBER', 'price' => '$$$', 'image' => 'molecule_01.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
    ];

    public function winter(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderwinter');
        }

        $gender = strtolower($gender); // Case-insensitivity fix

        $fragrances = collect($this->allFragrances)->filter(function ($item) use ($gender) {
            return $item['gender'] === $gender || $item['gender'] === 'unisex';
        });

        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        if ($request->sort == 'az') {
            $fragrances = $fragrances->sortBy('name');
        } elseif ($request->sort == 'za') {
            $fragrances = $fragrances->sortByDesc('name');
        }

        return view('fragrance.winter', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }

    public function show($name, $season, $gender)
    {
        $fragrance = collect($this->allFragrances)->firstWhere('name', $name);
        if (!$fragrance) { abort(404); }

        $notesArray = explode(',', $fragrance['notes']);
        return view('fragrance.show', compact('fragrance', 'notesArray', 'season', 'gender'));
    }
}
