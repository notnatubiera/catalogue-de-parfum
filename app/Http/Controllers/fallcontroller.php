<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fallcontroller extends Controller
{
    // Change 'summer' to 'spring' here:
    public function fall(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderfall');
        }

        $fragrances = collect([
            // ... your fragrance list ...
        ]);

        // ... rest of your code ...

        return view('fragrance.fall', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
