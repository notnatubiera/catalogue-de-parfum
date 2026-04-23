<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Yves Saint Laurent',
                'created_at' => '2026-04-21 06:52:16',
                'updated_at' => '2026-04-21 06:52:16',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dior',
                'created_at' => '2026-04-21 06:52:23',
                'updated_at' => '2026-04-21 06:52:23',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Chanel',
                'created_at' => '2026-04-21 06:52:47',
                'updated_at' => '2026-04-21 06:52:47',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Jo Malone',
                'created_at' => '2026-04-21 06:53:08',
                'updated_at' => '2026-04-21 06:53:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Versace',
                'created_at' => '2026-04-21 06:53:13',
                'updated_at' => '2026-04-21 06:53:13',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Maison Francis Kurkdjian',
                'created_at' => '2026-04-21 06:53:55',
                'updated_at' => '2026-04-21 06:56:48',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Le Labo',
                'created_at' => '2026-04-21 06:54:24',
                'updated_at' => '2026-04-21 06:54:24',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Tom Ford',
                'created_at' => '2026-04-21 06:57:02',
                'updated_at' => '2026-04-21 06:57:02',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Calvin Klein',
                'created_at' => '2026-04-21 06:57:09',
                'updated_at' => '2026-04-21 06:57:09',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Creed',
                'created_at' => '2026-04-21 06:57:13',
                'updated_at' => '2026-04-21 06:57:13',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Lancôme',
                'created_at' => '2026-04-21 06:57:23',
                'updated_at' => '2026-04-21 06:57:23',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Carolina Herrera',
                'created_at' => '2026-04-21 06:57:44',
                'updated_at' => '2026-04-21 06:57:44',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Mugler',
                'created_at' => '2026-04-21 06:57:49',
                'updated_at' => '2026-04-21 06:57:49',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Escentric Molecules',
                'created_at' => '2026-04-21 06:57:55',
                'updated_at' => '2026-04-21 06:57:55',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Byredo',
                'created_at' => '2026-04-21 06:58:00',
                'updated_at' => '2026-04-21 06:58:00',
            ),
        ));
        
        
    }
}