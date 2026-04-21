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

        $fragrances = collect([
            // MEN
            ['name' => 'Green Irish Tweed', 'brand' => 'Creed', 'gender' => 'men', 'notes' => 'LEMON, VERBENA, IRIS', 'price' => 310, 'image' => 'git.jpg'],
            ['name' => 'H24', 'brand' => 'Hermès', 'gender' => 'men', 'notes' => 'CLARY SAGE, NARCISSUS', 'price' => 105, 'image' => 'h24.jpg'],
            // WOMEN
            ['name' => 'Gucci Bloom', 'brand' => 'Gucci', 'gender' => 'women', 'notes' => 'TUBEROSE, JASMINE', 'price' => 155, 'image' => 'bloom.jpg'],
            ['name' => 'Daisy', 'brand' => 'Marc Jacobs', 'gender' => 'women', 'notes' => 'STRAWBERRY, VIOLET', 'price' => 90, 'image' => 'daisy.jpg'],
            // UNISEX
            ['name' => 'Philosykos', 'brand' => 'Diptyque', 'gender' => 'unisex', 'notes' => 'FIG LEAF, COCONUT', 'price' => 175, 'image' => 'philosykos.jpg'],
        ]);

        $fragrances = $fragrances->where('gender', $gender);

        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        return view('fragrance.spring', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
