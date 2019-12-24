<?php

use Illuminate\Database\Seeder;

class PencegahanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pencegahan')->delete();
        
        \DB::table('pencegahan')->insert(array (
            0 => 
            array (
                'id' => '1',
                'pencegahan' => 'Rutin bersihkan rumah dari jamur, debu, serbuk sari, dan polusi udara',
            ),
            1 => 
            array (
                'id' => '2',
            'pencegahan' => 'Pakai pelembab udara (humidifer) di kamar tidur atau ruang aktivitas lainnya',
            ),
            2 => 
            array (
                'id' => '3',
                'pencegahan' => 'Perbaiki saluran atau sumber air yang bocor secepat mungkin',
            ),
            3 => 
            array (
                'id' => '4',
                'pencegahan' => 'Pasang exhaust di kamar mandi untuk melancarkan sirkulasi udara',
            ),
            4 => 
            array (
                'id' => '5',
                'pencegahan' => 'Hindari perubahan suhu drastis dalam waktu yang singkat',
            ),
            5 => 
            array (
                'id' => '6',
                'pencegahan' => 'Jaga kesehatan tubuh agar tidak mudah sakit atau terserang infeksi',
            ),
            6 => 
            array (
                'id' => '7',
                'pencegahan' => 'Kelola stress dengan baik',
            ),
            7 => 
            array (
                'id' => '8',
                'pencegahan' => 'Tidur yang cukup',
            ),
        ));
        
        
    }
}