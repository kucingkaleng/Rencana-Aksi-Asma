<?php

use Illuminate\Database\Seeder;

class ObatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('obat')->delete();
        
        \DB::table('obat')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama_obat' => 'PULMICORT 100',
            ),
            1 => 
            array (
                'id' => '2',
                'nama_obat' => 'PULMICORT 200',
            ),
            2 => 
            array (
                'id' => '3',
                'nama_obat' => 'PULMICORT 400',
            ),
            3 => 
            array (
                'id' => '4',
                'nama_obat' => 'SYMBICORT 80',
            ),
            4 => 
            array (
                'id' => '5',
                'nama_obat' => 'SYMBICORT 160',
            ),
        ));
        
        
    }
}