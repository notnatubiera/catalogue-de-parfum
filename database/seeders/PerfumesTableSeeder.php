<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerfumesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perfumes')->delete();
        
        \DB::table('perfumes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Baccarat Rouge 540',
                'brand_id' => 7,
                'description' => 'A sweet, airy blend of saffron, amber, and woods with a clean, glowing vibe. It smells luxurious and lasts all day.',
                'image' => 'fragrances/01KPWFCNQGSKBEGEYSNHVTRNND.jpg',
                'created_at' => '2026-04-23 03:28:00',
                'updated_at' => '2026-04-23 14:13:27',
                'hero_image' => 'hero-images/01KPX9J20CA4QHTPKH0TF01393.jpg',
                'is_featured' => 1,
                'time_of_day' => '["night"]',
                'longevity' => 'Very Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$$$',
                'gender' => 'Unisex',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sauvage',
                'brand_id' => 2,
                'description' => 'Dior Sauvage is a radically fresh, "blue" fragrance defined by its strong presence and long-lasting performance. It opens with a sharp burst of Calabrian bergamot and spicy pepper, eventually settling into a raw, woody trail of amberwood and ambroxan. While famously marketed as a masculine scent fronted by Johnny Depp, its crisp, aromatic profile makes it popular for unisex wear. Highly versatile, it is suitable for all seasons and daily use, though its different concentrations—ranging from the fresh Eau de Toilette to the intense Elixir—allow it to transition seamlessly from the gym to formal evening events.',
                'image' => 'fragrances/01KPXAY2SFG7K9FEJVSAACDY91.jpg',
                'created_at' => '2026-04-23 14:12:07',
                'updated_at' => '2026-04-23 14:13:40',
                'hero_image' => 'hero-images/01KPXAY2SQFHWH94PV2H5X98TX.jpg',
                'is_featured' => 0,
                'time_of_day' => '["night","day"]',
                'longevity' => 'Long Lasting',
                'sillage' => 'Strong',
                'price' => '$$$',
                'gender' => 'Masculine',
            ),
        ));
        
        
    }
}