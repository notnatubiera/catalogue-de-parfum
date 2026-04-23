<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seasons')->delete();
        
        \DB::table('seasons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Winter',
                'created_at' => '2026-04-23 03:07:58',
                'updated_at' => '2026-04-23 03:07:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Fall',
                'created_at' => '2026-04-23 03:08:01',
                'updated_at' => '2026-04-23 03:08:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Summer',
                'created_at' => '2026-04-23 03:08:05',
                'updated_at' => '2026-04-23 03:08:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Spring',
                'created_at' => '2026-04-23 03:08:08',
                'updated_at' => '2026-04-23 03:08:08',
            ),
        ));
        
        
    }
}