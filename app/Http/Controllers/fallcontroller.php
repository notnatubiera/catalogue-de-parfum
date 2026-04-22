<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fallcontroller extends Controller
{
    public function fall(Request $request, $gender = null)
    {
        // 1. Show the selection page if no gender is picked
        if (!$gender) {
            return view('fragrance.gender.genderfall');
        }

        $allFragrances = collect([
            // --- MEN (Checked for Fall in Sheet) ---
            ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'FRESH SPICY, AMBER, CITRUS', 'price' => 110, 'image' => 'sauvage.jpg'],
            ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'notes' => 'CITRUS, WOODY, FRESH', 'price' => 130, 'image' => 'bleu_chanel.jpg'],
            ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'FRUITY, SMOKY, FRESH', 'price' => 435, 'image' => 'creed_aventus.jpg'],

            // --- WOMEN (Checked for Fall in Sheet) ---
            ['name' => 'La Vie Est Belle', 'brand' => 'Lancôme', 'gender' => 'women', 'notes' => 'SWEET, VANILLA, FRUITY', 'price' => 115, 'image' => 'la-vie-est-belle.jpg'],
            ['name' => 'Good Girl', 'brand' => 'Carolina Herrera', 'gender' => 'women', 'notes' => 'SWEET, WHITE FLORAL, CACAO', 'price' => 120, 'image' => 'good-girl.jpg'],
            ['name' => 'Libre', 'brand' => 'YSL', 'gender' => 'women', 'notes' => 'FLORAL, CITRUS, VANILLA', 'price' => 130, 'image' => 'libre.jpg'],

            // --- UNISEX (Checked for Fall in Sheet - Appears in Both) ---
            ['name' => 'Baccarat Rouge 540', 'brand' => 'MFK', 'gender' => 'unisex', 'notes' => 'AMBER, SWEET, WOODY', 'price' => 325, 'image' => 'baccarat-rouge-540.jpg'],
            ['name' => 'Black Orchid', 'brand' => 'Tom Ford', 'gender' => 'unisex', 'notes' => 'EARTHY, FLORAL, SPICY', 'price' => 160, 'image' => 'black-orchid.jpg'],
            ['name' => 'Santal 33', 'brand' => 'Le Labo', 'gender' => 'unisex', 'notes' => 'WOODY, LEATHER, SPICY', 'price' => 310, 'image' => 'santal-33.jpg'],
        ]);

        // Filter to include chosen gender + unisex
        $fragrances = $allFragrances->filter(function ($item) use ($gender) {
            return $item['gender'] === $gender || $item['gender'] === 'unisex';
        });

        // Brand filtering
        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        // Sorting
        if ($request->sort == 'az') {
            $fragrances = $fragrances->sortBy('name');
        } elseif ($request->sort == 'za') {
            $fragrances = $fragrances->sortByDesc('name');
        }

        return view('fragrance.fall', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
        public function show($name, $season, $gender)
    {
        $allFragrances = collect([
            // --- MEN (Checked for Fall in Sheet) ---
            ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'FRESH SPICY, AMBER, CITRUS', 'price' => 110, 'image' => 'sauvage.jpg'],
            ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'notes' => 'CITRUS, WOODY, FRESH', 'price' => 130, 'image' => 'bleu_chanel.jpg'],
            ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'FRUITY, SMOKY, FRESH', 'price' => 435, 'image' => 'creed_aventus.jpg'],

            // --- WOMEN (Checked for Fall in Sheet) ---
            ['name' => 'La Vie Est Belle', 'brand' => 'Lancôme', 'gender' => 'women', 'notes' => 'SWEET, VANILLA, FRUITY', 'price' => 115, 'image' => 'la-vie-est-belle.jpg'],
            ['name' => 'Good Girl', 'brand' => 'Carolina Herrera', 'gender' => 'women', 'notes' => 'SWEET, WHITE FLORAL, CACAO', 'price' => 120, 'image' => 'good-girl.jpg'],
            ['name' => 'Libre', 'brand' => 'YSL', 'gender' => 'women', 'notes' => 'FLORAL, CITRUS, VANILLA', 'price' => 130, 'image' => 'libre.jpg'],

            // --- UNISEX (Checked for Fall in Sheet - Appears in Both) ---
            ['name' => 'Baccarat Rouge 540', 'brand' => 'MFK', 'gender' => 'unisex', 'notes' => 'AMBER, SWEET, WOODY', 'price' => 325, 'image' => 'baccarat-rouge-540.jpg'],
            ['name' => 'Black Orchid', 'brand' => 'Tom Ford', 'gender' => 'unisex', 'notes' => 'EARTHY, FLORAL, SPICY', 'price' => 160, 'image' => 'black-orchid.jpg'],
            ['name' => 'Santal 33', 'brand' => 'Le Labo', 'gender' => 'unisex', 'notes' => 'WOODY, LEATHER, SPICY', 'price' => 310, 'image' => 'santal-33.jpg'],
        ]);

        $fragrance = collect($this->allFragrances)->firstWhere('name', $name);

        if (!$fragrance) {
            abort(404, "Fragrance not found in our collection.");
        }

        $notesArray = explode(',', $fragrance['notes']);

        return view('fragrance.show', [
            'fragrance' => $fragrance,
            'notesArray' => $notesArray,
            'season' => $season,
            'gender' => $gender
        ]);
    }

}
