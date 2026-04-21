<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summercontroller extends Controller
{
    // 1. Added "= null" to make gender optional
    public function summer(Request $request, $gender = null)
    {
        // 2. If no gender is picked yet, show the "choose gender" page
        if (!$gender) {
            return view('fragrance.gender.gendersummer');
        }

        $fragrances = collect([
            // --- MEN ---
            ['name' => 'Sauvage EDT', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'BERGAMOT, PEPPER, AMBROXAN', 'price' => 110, 'image' => 'sauvage.jpg'],
            ['name' => 'Eros Energy', 'brand' => 'Versace', 'gender' => 'men', 'notes' => 'BLOOD ORANGE, LIME', 'price' => 95, 'image' => 'eros_energy.jpg'],
            ['name' => 'Le Beau', 'brand' => 'JPG', 'gender' => 'men', 'notes' => 'COCONUT, BERGAMOT', 'price' => 120, 'image' => 'lebeau.jpg'],

            // --- WOMEN ---
            ['name' => 'Miss Dior Blooming Bouquet', 'brand' => 'Dior', 'gender' => 'women', 'notes' => 'PEONY, ROSE, WHITE MUSK', 'price' => 140, 'image' => 'blooming.jpg'],
            ['name' => 'Bright Crystal', 'brand' => 'Versace', 'gender' => 'women', 'notes' => 'YUZU, POMEGRANATE, LOTUS', 'price' => 105, 'image' => 'bright_crystal.jpg'],
            ['name' => 'Libre Toilette', 'brand' => 'YSL', 'notes' => 'LAVENDER, ORANGE BLOSSOM, TEA', 'gender' => 'women', 'price' => 115, 'image' => 'libre_edt.jpg'],
            ['name' => 'Classique Pride', 'brand' => 'JPG', 'gender' => 'women', 'notes' => 'CITRUS, NEROLI, MUSK', 'price' => 110, 'image' => 'classique.jpg'],

            // --- UNISEX ---
            ['name' => 'Escale à Portofino', 'brand' => 'Dior', 'gender' => 'unisex', 'notes' => 'CITRON, PETITGRAIN, ALMOND', 'price' => 130, 'image' => 'portofino.jpg'],
            ['name' => 'Gaultier Divine', 'brand' => 'JPG', 'gender' => 'unisex', 'notes' => 'SEA SALT, LILY, MERINGUE', 'price' => 145, 'image' => 'divine.jpg'],
            ['name' => 'Saharienne', 'brand' => 'YSL', 'gender' => 'unisex', 'notes' => 'LEMON, PINK PEPPER, GINGER', 'price' => 120, 'image' => 'saharienne.jpg'],
        ]);

        // Filter by Gender
        $fragrances = $fragrances->where('gender', $gender);

        // Apply Brand filter
        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        // Sort
        if ($request->sort == 'az') {
            $fragrances = $fragrances->sortBy('name');
        } elseif ($request->sort == 'za') {
            $fragrances = $fragrances->sortByDesc('name');
        }

        return view('fragrance.summer', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
