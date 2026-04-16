<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summercontroller extends Controller
{
    public function summer(Request $request)
    {
        // 1. Your list of 10 fragrances
        $fragrances = collect([
            ['name' => 'Citrus Breeze', 'brand' => 'AquaVibe', 'notes' => 'BERGAMOT, LEMON, NEROLI', 'price' => 120, 'image' => 'summer.jpg'],
            ['name' => 'Amalfi Lemon', 'brand' => 'Coastal', 'notes' => 'LEMON ZEST, MINT, BASIL', 'price' => 95, 'image' => 'summer.jpg'],
            ['name' => 'Ocean Mist', 'brand' => 'AquaVibe', 'notes' => 'SEA SALT, ALGAE, AMBERGRIS', 'price' => 110, 'image' => 'summer.jpg'],
            ['name' => 'Mediterranean Neroli', 'brand' => 'Luxe', 'notes' => 'ORANGE BLOSSOM, PETITGRAIN', 'price' => 145, 'image' => 'summer.jpg'],
            ['name' => 'Azure Marine', 'brand' => 'Coastal', 'notes' => 'WATER LILY, DRIFTWOOD, MUSK', 'price' => 105, 'image' => 'summer.jpg'],
            ['name' => 'Sun-Drenched Fig', 'brand' => 'Botanica', 'notes' => 'FIG LEAF, COCONUT, CEDAR', 'price' => 130, 'image' => 'summer.jpg'],
            ['name' => 'Turquoise Wave', 'brand' => 'AquaVibe', 'notes' => 'OZONE, JASMINE, SANDALWOOD', 'price' => 115, 'image' => 'summer.jpg'],
            ['name' => 'Island Hibiscus', 'brand' => 'Botanica', 'notes' => 'HIBISCUS, PAPAYA, VANILLA', 'price' => 90, 'image' => 'summer.jpg'],
            ['name' => 'Salty Driftwood', 'brand' => 'Coastal', 'notes' => 'SAGE, SEA WATER, PATCHOULI', 'price' => 125, 'image' => 'summer.jpg'],
            ['name' => 'Bergamot Bloom', 'brand' => 'Luxe', 'notes' => 'BERGAMOT, WHITE TEA, PEONY', 'price' => 150, 'image' => 'summer.jpg'],
        ]);

        // 2. The Logic for Filtering
        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        // 3. The Logic for Sorting
        if ($request->sort == 'az') {
            $fragrances = $fragrances->sortBy('name');
        } elseif ($request->sort == 'za') {
            $fragrances = $fragrances->sortByDesc('name');
        }

        // 4. Send it to your blade file
        return view('fragrance.summer', ['fragrances' => $fragrances]);
    }
}
