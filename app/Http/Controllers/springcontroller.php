<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class springcontroller extends Controller
{
    public function spring(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderspring');
        }

        $allFragrances = collect([
            // --- MEN (Masculine in Sheet - Checked for Spring) ---
            [
                'name' => 'Sauvage',
                'brand' => 'Dior',
                'gender' => 'men',
                'notes' => 'FRESH SPICY, AMBER, AROMATIC, CITRUS, WOODY',
                'image' => 'sauvage.jpg'
            ],
            [
                'name' => 'Bleu de Chanel',
                'brand' => 'Chanel',
                'gender' => 'men',
                'notes' => 'CITRUS, WOODY, FRESH, AROMATIC, SPICY',
                'image' => 'bleu-de-chanel.jpg'
            ],
            [
                'name' => 'Aventus',
                'brand' => 'Creed',
                'gender' => 'men',
                'notes' => 'FRUITY, SMOKY, WOODY, FRESH, MUSKY',
                'image' => 'aventus.jpg'
            ],

            // --- WOMEN (Feminine in Sheet - Checked for Spring) ---
            [
                'name' => 'Libre',
                'brand' => 'Yves Saint Laurent',
                'gender' => 'women',
                'notes' => 'WHITE FLORAL, VANILLA, AROMATIC, CITRUS, MUSKY',
                'image' => 'libre.jpg'
            ],

            // --- UNISEX (Unisex in Sheet - Checked for Spring) ---
            [
                'name' => 'Baccarat Rouge 540',
                'brand' => 'Maison Francis Kurkdjian',
                'gender' => 'unisex',
                'notes' => 'AMBER, SWEET, WOODY, WARM SPICY, MUSKY',
                'image' => 'baccarat-rouge-540.jpg'
            ],
            [
                'name' => 'CK One',
                'brand' => 'Calvin Klein',
                'gender' => 'unisex',
                'notes' => 'CITRUS, FRESH, GREEN, AROMATIC, MUSKY',
                'image' => 'ck-one.jpg'
            ],
            [
                'name' => 'Santal 33',
                'brand' => 'Le Labo',
                'gender' => 'unisex',
                'notes' => 'WOODY, LEATHER, SMOKY, MUSKY, SPICY',
                'image' => 'santal-33.jpg'
            ],
            [
                'name' => 'Wood Sage & Sea Salt',
                'brand' => 'Jo Malone',
                'gender' => 'unisex',
                'notes' => 'FRESH, SALTY, MARINE, WOODY, MUSKY',
                'image' => 'jomalone.jpg'
            ],
            [
                'name' => 'Molecule 01',
                'brand' => 'Escentric Molecules',
                'gender' => 'unisex',
                'notes' => 'WOODY, MUSKY, AMBER, FRESH, MINIMALIST',
                'image' => 'molecule-01.jpg'
            ],
            [
                'name' => 'Gypsy Water',
                'brand' => 'Byredo',
                'gender' => 'unisex',
                'notes' => 'CITRUS, WOODY, VANILLA, FRESH, SPICY',
                'image' => 'gypsy-water.jpg'
            ],
        ]);

        // Logic: Selected gender + Unisex
        $fragrances = $allFragrances->filter(function ($item) use ($gender) {
            return $item['gender'] === $gender || $item['gender'] === 'unisex';
        });

        // Brand filtering
        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        // Sorting (A-Z / Z-A)
        if ($request->sort == 'az') {
            $fragrances = $fragrances->sortBy('name');
        } elseif ($request->sort == 'za') {
            $fragrances = $fragrances->sortByDesc('name');
        }

        return view('fragrance.spring', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
