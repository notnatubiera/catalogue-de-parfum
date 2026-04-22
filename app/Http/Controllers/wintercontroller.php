<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class wintercontroller extends Controller
{
    public function winter(Request $request, $gender = null)
    {
        // 1. If no gender is picked yet, show the "choose gender" page
        if (!$gender) {
            return view('fragrance.gender.genderwinter');
        }

        $allFragrances = collect([
            // --- MEN (Checked for Winter in Sheet) ---
            ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'FRESH SPICY, AMBER, CITRUS', 'price' => 110, 'image' => 'sauvage.jpg'],
            ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'notes' => 'CITRUS, WOODY, FRESH', 'price' => 130, 'image' => 'bleu_chanel.jpg'],
            ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'FRUITY, SMOKY, FRESH', 'price' => 435, 'image' => 'creed_aventus.jpg'],
            ['name' => 'Eros', 'brand' => 'Versace', 'gender' => 'men', 'notes' => 'VANILLA, FRESH, SWEET', 'price' => 95, 'image' => 'eros.jpg'],

            // --- WOMEN (Checked for Winter in Sheet) ---
            ['name' => 'La Vie Est Belle', 'brand' => 'Lancôme', 'gender' => 'women', 'notes' => 'SWEET, VANILLA, POWDERY', 'price' => 115, 'image' => 'la-vie-est-belle.jpg'],
            ['name' => 'Good Girl', 'brand' => 'Carolina Herrera', 'gender' => 'women', 'notes' => 'SWEET, WHITE FLORAL, CACAO', 'price' => 120, 'image' => 'goodgirl.jpg'],
            ['name' => 'Libre', 'brand' => 'YSL', 'gender' => 'women', 'notes' => 'WHITE FLORAL, VANILLA, AROMATIC', 'price' => 130, 'image' => 'libre.jpg'],
            ['name' => 'Alien', 'brand' => 'Mugler', 'gender' => 'women', 'notes' => 'WHITE FLORAL, AMBER, WOODY', 'price' => 140, 'image' => 'alien.jpg'],

            // --- UNISEX (Checked for Winter in Sheet - Appears in Both) ---
            ['name' => 'Baccarat Rouge 540', 'brand' => 'MFK', 'gender' => 'unisex', 'notes' => 'AMBER, SWEET, WOODY', 'price' => 325, 'image' => 'baccarat_540.jpg'],
            ['name' => 'Black Orchid', 'brand' => 'Tom Ford', 'gender' => 'unisex', 'notes' => 'EARTHY, FLORAL, WOODY', 'price' => 160, 'image' => 'black_orchid.jpg'],
            ['name' => 'Santal 33', 'brand' => 'Le Labo', 'gender' => 'unisex', 'notes' => 'WOODY, LEATHER, SMOKY', 'price' => 310, 'image' => 'santal_33.jpg'],
            ['name' => 'Molecule 01', 'brand' => 'Escentric Molecules', 'gender' => 'unisex', 'notes' => 'WOODY, MUSKY, AMBER', 'price' => 150, 'image' => 'molecule_01.jpg'],
        ]);

        // Filter: Include chosen gender + unisex
        $fragrances = $allFragrances->filter(function ($item) use ($gender) {
            return $item['gender'] === $gender || $item['gender'] === 'unisex';
        });

        // Apply Brand filter
        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        // Apply Sorting
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
}
