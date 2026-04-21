<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fallcontroller extends Controller
{
    public function fall(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderfall');
        }

        $fragrances = collect([
            // MEN
            ['name' => 'Ombré Leather', 'brand' => 'Tom Ford', 'gender' => 'men', 'notes' => 'LEATHER, CARDAMOM', 'price' => 150, 'image' => 'ombre.jpg'],
            ['name' => 'The One EDP', 'brand' => 'D&G', 'gender' => 'men', 'notes' => 'AMBER, TOBACCO, GINGER', 'price' => 115, 'image' => 'theone.jpg'],
            // WOMEN
            ['name' => 'Black Orchid', 'brand' => 'Tom Ford', 'gender' => 'women', 'notes' => 'TRUFFLE, ORCHID, PATCHOULI', 'price' => 160, 'image' => 'black_orchid.jpg'],
            ['name' => 'Libre Intense', 'brand' => 'YSL', 'gender' => 'women', 'notes' => 'LAVENDER, VANILLA', 'price' => 130, 'image' => 'libre_intense.jpg'],
            // UNISEX
            ['name' => 'By the Fireplace', 'brand' => 'Replica', 'gender' => 'unisex', 'notes' => 'CHESTNUT, VANILLA, CLOVE', 'price' => 140, 'image' => 'fireplace.jpg'],
        ]);

        $fragrances = $fragrances->where('gender', $gender);

        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        return view('fragrance.fall', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
