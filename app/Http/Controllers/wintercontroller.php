<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class wintercontroller extends Controller
{
    public function winter(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderwinter');
        }

        $fragrances = collect([
            // MEN
            ['name' => 'Spicebomb Extreme', 'brand' => 'Viktor&Rolf', 'gender' => 'men', 'notes' => 'TOBACCO, VANILLA, PEPPER', 'price' => 125, 'image' => 'spicebomb.jpg'],
            ['name' => 'Stronger With You Intensely', 'brand' => 'Armani', 'gender' => 'men', 'notes' => 'TOFFEE, CINNAMON', 'price' => 110, 'image' => 'swy.jpg'],
            // WOMEN
            ['name' => 'Black Opium', 'brand' => 'YSL', 'gender' => 'women', 'notes' => 'COFFEE, VANILLA, PEAR', 'price' => 140, 'image' => 'black_opium.jpg'],
            ['name' => 'Good Girl', 'brand' => 'Carolina Herrera', 'gender' => 'women', 'notes' => 'TONKA BEAN, CACAO', 'price' => 120, 'image' => 'goodgirl.jpg'],
            // UNISEX
            ['name' => 'Tobacco Vanille', 'brand' => 'Tom Ford', 'gender' => 'unisex', 'notes' => 'TOBACCO, VANILLA, DRIED FRUITS', 'price' => 285, 'image' => 'tobacco_vanille.jpg'],
        ]);

        $fragrances = $fragrances->where('gender', $gender);

        if ($request->brand && $request->brand != 'all') {
            $fragrances = $fragrances->where('brand', $request->brand);
        }

        return view('fragrance.winter', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
