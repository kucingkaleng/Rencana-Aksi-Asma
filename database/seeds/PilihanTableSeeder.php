<?php

use Illuminate\Database\Seeder;

class PilihanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pilihan')->delete();
        
        \DB::table('pilihan')->insert(array (
            0 => 
            array (
                'id' => '2',
                'zona' => '2',
                'pilihan' => 'Beri Steroid inhalasi dosis rendah. Apakah ada berubahan?',
                'order' => '0',
            ),
            1 => 
            array (
                'id' => '3',
                'zona' => '3',
                'pilihan' => 'Beri Steroid inhalasi dosis sedang. Apakah ada perubahan?',
                'order' => '0',
            ),
            2 => 
            array (
                'id' => '4',
                'zona' => '3',
                'pilihan' => 'Dirujuk kepada dokter spesialis respirologi anak untuk pemeriksaan lebih lanjut.',
                'order' => '1',
            ),
        ));
        
        
    }
}