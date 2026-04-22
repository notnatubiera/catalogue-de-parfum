<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class summercontroller extends Controller
{
    public function summer(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.gendersummer');
        }

        $allFragrances = collect([
            // Masculine
            ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'FRESH SPICY, AMBER, AROMATIC, CITRUS, WOODY', 'image' => 'sauvage.jpg'],
            ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'notes' => 'CITRUS, WOODY, FRESH, AROMATIC, SPICY', 'image' => 'bleu_chanel.jpg'],
            ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'FRUITY, SMOKY, WOODY, FRESH, MUSKY', 'image' => 'creed_aventus.jpg'],

            // Feminine
            ['name' => 'Libre', 'brand' => 'Yves Saint Laurent', 'gender' => 'women', 'notes' => 'WHITE FLORAL, VANILLA, AROMATIC, CITRUS, MUSKY', 'image' => 'libre.jpg'],

            // Unisex
            ['name' => 'CK One', 'brand' => 'Calvin Klein', 'gender' => 'unisex', 'notes' => 'CITRUS, FRESH, GREEN, AROMATIC, MUSKY', 'image' => 'ck-one.jpg'],
            ['name' => 'Wood Sage & Sea Salt', 'brand' => 'Jo Malone', 'gender' => 'unisex', 'notes' => 'FRESH, SALTY, MARINE, WOODY, MUSKY', 'image' => 'jomalone.jpg'],
            ['name' => 'Molecule 01', 'brand' => 'Escentric Molecules', 'gender' => 'unisex', 'notes' => 'WOODY, MUSKY, AMBER, FRESH, MINIMALIST', 'image' => 'molecule-01.jpg'],
            ['name' => 'Gypsy Water', 'brand' => 'Byredo', 'gender' => 'unisex', 'notes' => 'CITRUS, WOODY, VANILLA, FRESH, SPICY', 'image' => 'gypsy-water.jpg'],
        ]);

        // Logic to show selected gender + unisex items
        $fragrances = $allFragrances->filter(function ($item) use ($gender) {
            return $item['gender'] === $gender || $item['gender'] === 'unisex';
        });

        // Brand filtering (using strict names from the list)
        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        // Sorting (A-Z / Z-A only, as requested)
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
    public function show($name, $season, $gender)
    {
        $allFragrances = collect([
            // Masculine
            ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'notes' => 'FRESH SPICY, AMBER, AROMATIC, CITRUS, WOODY', 'image' => 'sauvage.jpg'],
            ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'notes' => 'CITRUS, WOODY, FRESH, AROMATIC, SPICY', 'image' => 'bleu_chanel.jpg'],
            ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'FRUITY, SMOKY, WOODY, FRESH, MUSKY', 'image' => 'creed_aventus.jpg'],

            // Feminine
            ['name' => 'Libre', 'brand' => 'Yves Saint Laurent', 'gender' => 'women', 'notes' => 'WHITE FLORAL, VANILLA, AROMATIC, CITRUS, MUSKY', 'image' => 'libre.jpg'],

            // Unisex
            ['name' => 'CK One', 'brand' => 'Calvin Klein', 'gender' => 'unisex', 'notes' => 'CITRUS, FRESH, GREEN, AROMATIC, MUSKY', 'image' => 'ck-one.jpg'],
            ['name' => 'Wood Sage & Sea Salt', 'brand' => 'Jo Malone', 'gender' => 'unisex', 'notes' => 'FRESH, SALTY, MARINE, WOODY, MUSKY', 'image' => 'jomalone.jpg'],
            ['name' => 'Molecule 01', 'brand' => 'Escentric Molecules', 'gender' => 'unisex', 'notes' => 'WOODY, MUSKY, AMBER, FRESH, MINIMALIST', 'image' => 'molecule-01.jpg'],
            ['name' => 'Gypsy Water', 'brand' => 'Byredo', 'gender' => 'unisex', 'notes' => 'CITRUS, WOODY, VANILLA, FRESH, SPICY', 'image' => 'gypsy-water.jpg'],
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
