<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class springcontroller extends Controller
{
    private $allFragrances = [
        ['name' => 'Baccarat Rouge 540', 'brand' => 'MFK', 'gender' => 'unisex', 'winter' => true, 'spring' => true, 'notes' => 'AMBER, SWEET, WOODY, WARM SPICY, MUSKY', 'price' => '$$$$$', 'image' => 'baccarat-rouge-540.jpg', 'longevity' => 'Very Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Sauvage', 'brand' => 'Dior', 'gender' => 'men', 'winter' => true, 'spring' => true, 'notes' => 'FRESH SPICY, AMBER, AROMATIC, CITRUS, WOODY', 'price' => '$$$', 'image' => 'sauvage.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Bleu de Chanel', 'brand' => 'Chanel', 'gender' => 'men', 'winter' => true, 'spring' => true, 'notes' => 'CITRUS, WOODY, FRESH, AROMATIC, SPICY', 'price' => '$$$$', 'image' => 'bleu_chanel.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
        ['name' => 'Black Orchid', 'brand' => 'Tom Ford', 'gender' => 'unisex', 'winter' => true, 'spring' => false, 'notes' => 'EARTHY, FLORAL, WOODY, SWEET, SPICY', 'price' => '$$$$', 'image' => 'black-orchid.jpg', 'longevity' => 'Very Long Lasting', 'sillage' => 'Enormous'],
        ['name' => 'CK One', 'brand' => 'Calvin Klein', 'gender' => 'unisex', 'winter' => false, 'spring' => true, 'notes' => 'CITRUS, FRESH, GREEN, AROMATIC, MUSKY', 'price' => '$$', 'image' => 'ck-one.jpg', 'longevity' => 'Moderate', 'sillage' => 'Moderate'],
        ['name' => 'Aventus', 'brand' => 'Creed', 'gender' => 'men', 'winter' => true, 'spring' => true, 'notes' => 'FRUITY, SMOKY, WOODY, FRESH, MUSKY', 'price' => '$$$$$', 'image' => 'creed_aventus.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'La Vie Est Belle', 'brand' => 'Lancôme', 'gender' => 'women', 'winter' => true, 'spring' => false, 'notes' => 'SWEET, VANILLA, POWDERY, FRUITY, PATCHOULI', 'price' => '$$$', 'image' => 'la-vie-est-belle.jpg', 'longevity' => 'Eternal', 'sillage' => 'Strong'],
        ['name' => 'Good Girl', 'brand' => 'Carolina Herrera', 'gender' => 'women', 'winter' => true, 'spring' => false, 'notes' => 'SWEET, WHITE FLORAL, WARM SPICY, CACAO, VANILLA', 'price' => '$$$', 'image' => 'good-girl.jpg', 'longevity' => 'Very Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Santal 33', 'brand' => 'Le Labo', 'gender' => 'unisex', 'winter' => true, 'spring' => true, 'notes' => 'WOODY, LEATHER, SMOKY, MUSKY, SPICY', 'price' => '$$$$$', 'image' => 'santal-33.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
        ['name' => 'Libre', 'brand' => 'YSL', 'gender' => 'women', 'winter' => true, 'spring' => true, 'notes' => 'WHITE FLORAL, VANILLA, AROMATIC, CITRUS, MUSKY', 'price' => '$$$', 'image' => 'libre.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Eros', 'brand' => 'Versace', 'gender' => 'men', 'winter' => true, 'spring' => false, 'notes' => 'VANILLA, FRESH, SWEET, WOODY, AROMATIC', 'price' => '$$$', 'image' => 'eros.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Strong'],
        ['name' => 'Alien', 'brand' => 'Mugler', 'gender' => 'women', 'winter' => true, 'spring' => false, 'notes' => 'WHITE FLORAL, AMBER, WOODY, MUSKY, FLORAL', 'price' => '$$$$', 'image' => 'alien.jpg', 'longevity' => 'Eternal', 'sillage' => 'Enormous'],
        ['name' => 'Wood Sage & Sea Salt', 'brand' => 'Jo Malone', 'gender' => 'unisex', 'winter' => false, 'spring' => true, 'notes' => 'FRESH, SALTY, MARINE, WOODY, MUSKY', 'price' => '$$$$', 'image' => 'jomalone.jpg', 'longevity' => 'Moderate', 'sillage' => 'Intimate'],
        ['name' => 'Molecule 01', 'brand' => 'Escentric Molecules', 'gender' => 'unisex', 'winter' => true, 'spring' => true, 'notes' => 'WOODY, MUSKY, AMBER, FRESH, MINIMALIST', 'price' => '$$$$', 'image' => 'molecule-01.jpg', 'longevity' => 'Long Lasting', 'sillage' => 'Moderate'],
        ['name' => 'Gypsy Water', 'brand' => 'Byredo', 'gender' => 'unisex', 'winter' => false, 'spring' => true, 'notes' => 'CITRUS, WOODY, VANILLA, FRESH, SPICY', 'price' => '$$$$', 'image' => 'gypsy-water.jpg', 'longevity' => 'Moderate', 'sillage' => 'Moderate'],
    ];

    public function spring(Request $request, $gender = null)
    {
        if (!$gender) { return view('fragrance.gender.genderspring'); }

        $gender = strtolower($gender);
        $fragrances = $this->applyFilters('spring', $gender, $request);

        return view('fragrance.spring', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender),
            'season' => 'spring'
        ]);
    }

    public function winter(Request $request, $gender = null)
    {
        if (!$gender) { return view('fragrance.gender.genderwinter'); }

        $gender = strtolower($gender);
        $fragrances = $this->applyFilters('winter', $gender, $request);

        return view('fragrance.winter', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender),
            'season' => 'winter'
        ]);
    }

    /**
     * Unified filtering logic for Brand and Alphabetical Sorting
     */
    private function applyFilters($seasonField, $gender, $request)
    {
        $collection = collect($this->allFragrances)
            ->where($seasonField, true) // Checks if 'winter' or 'spring' is true
            ->filter(function ($item) use ($gender) {
                // Allows specific gender OR unisex items
                return $item['gender'] === $gender || $item['gender'] === 'unisex';
            });

        // 1. BRAND FILTER: Checks if the user selected a specific brand
        if ($request->filled('brand') && $request->brand !== 'all') {
            $collection = $collection->where('brand', $request->brand);
        }

        // 2. SORTING: Sorts by name based on the 'sort' dropdown
        if ($request->sort === 'az') {
            $collection = $collection->sortBy('name');
        } elseif ($request->sort === 'za') {
            $collection = $collection->sortByDesc('name');
        }

        return $collection;
    }

}
