<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class springcontroller extends Controller
{
    // Change 'summer' to 'spring' here:
    public function spring(Request $request, $gender = null)
    {
        if (!$gender) {
            return view('fragrance.gender.genderspring');
        }

        $fragrances = collect([
            // ... your fragrance list ...
        ]);

        // ... rest of your code ...

        return view('fragrance.spring', [
            'fragrances' => $fragrances,
            'genderTitle' => ucfirst($gender)
        ]);
    }
}
