<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OccasionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('occasions')->delete();
        
        \DB::table('occasions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Daily',
                'created_at' => '2026-04-21 06:49:33',
                'updated_at' => '2026-04-23 03:28:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Office',
                'created_at' => '2026-04-21 06:49:38',
                'updated_at' => '2026-04-21 06:49:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Date',
                'created_at' => '2026-04-21 06:49:49',
                'updated_at' => '2026-04-21 06:49:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sport',
                'created_at' => '2026-04-21 06:49:55',
                'updated_at' => '2026-04-21 06:49:55',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Formal',
                'created_at' => '2026-04-21 06:50:00',
                'updated_at' => '2026-04-21 06:50:00',
            ),
        ));
        
        
    }
}