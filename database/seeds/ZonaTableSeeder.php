<?php

use Illuminate\Database\Seeder;

class ZonaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('zona')->delete();
        
        \DB::table('zona')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Zona Aman',
                'alias' => 'Zona Hijau',
                'gejala' => '["Bernafas dengan mudah","Tidak ada mengi atau batuk","Mampu melakukan aktivitas seperti biasa","Bisa tidur nyenyak"]',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'Zona Waspada',
                'alias' => 'Zona Kuning',
                'gejala' => '[
"Nafas mulai pendek",
"Batuk, mengi, dada terasa sesak",
"Aktivitas harian mulai terhambat",
"Gejala mengganggu tidur",
"Menunjukkan gejala influenza"
]',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Zona Bahaya',
                'alias' => 'Zona Merah',
                'gejala' => '[
"Masalah pernafasan yang semakin parah",
"Tidak mampu melakukan aktivitas rutin",
"Sulit berjalan dan berbicara",
"Obat-obatan darurat sudah tidak membantu"
]',
            ),
        ));
        
        
    }
}