<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerfumeSeasonTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perfume_season')->delete();
        
        \DB::table('perfume_season')->insert(array (
            0 => 
            array (
                'id' => 1,
                'perfume_id' => 1,
                'season_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'perfume_id' => 1,
                'season_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'perfume_id' => 1,
                'season_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'perfume_id' => 2,
                'season_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'perfume_id' => 2,
                'season_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'perfume_id' => 2,
                'season_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'perfume_id' => 2,
                'season_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}