<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class wintercontroller extends Controller
{
    // Change 'summer' to 'spring' here:
    public function winter(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderwinter');
        }

        $fragrances = collect([
            // ... your fragrance list ...
        ]);

        // ... rest of your code ...

        return view('fragrance.winter', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
