<?php

use Illuminate\Database\Seeder;

class DosisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dosis')->delete();
        
        \DB::table('dosis')->insert(array (
            0 => 
            array (
                'id' => '1',
                'obat' => '1',
                'kandungan' => 'Budesonide 100mcg',
                'usia' => 'anak',
                'dosis_rendah' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_sedang' => '2x Sehari, 2 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 3 semprot / inhalasi',
            ),
            1 => 
            array (
                'id' => '2',
                'obat' => '1',
                'kandungan' => 'Budesonide 100mcg',
                'usia' => 'dewasa',
                'dosis_rendah' => '2x Sehari, 2 semprot / inhalasi',
                'dosis_sedang' => '2x Sehari, 3 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 4 semprot / inhalasi',
            ),
            2 => 
            array (
                'id' => '3',
                'obat' => '2',
                'kandungan' => 'Budesonide 200mcg',
                'usia' => 'anak',
                'dosis_rendah' => NULL,
                'dosis_sedang' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 2 semprot / inhalasi',
            ),
            3 => 
            array (
                'id' => '4',
                'obat' => '2',
                'kandungan' => 'Budesonide 200mcg',
                'usia' => 'dewasa',
                'dosis_rendah' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_sedang' => '2x Sehari, 2 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 3 semprot / inhalasi',
            ),
            4 => 
            array (
                'id' => '5',
                'obat' => '3',
                'kandungan' => 'Budesonide 200mcg',
                'usia' => 'anak',
                'dosis_rendah' => NULL,
                'dosis_sedang' => NULL,
                'dosis_tinggi' => '2x Sehari, 1 semprot / inhalasi',
            ),
            5 => 
            array (
                'id' => '6',
                'obat' => '3',
                'kandungan' => 'Budesonide 200mcg',
                'usia' => 'dewasa',
                'dosis_rendah' => NULL,
                'dosis_sedang' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 2 semprot / inhalasi',
            ),
            6 => 
            array (
                'id' => '7',
                'obat' => '4',
                'kandungan' => 'Budesonide 80 mcg, Formoterol Fumarate 4.5 mcg',
                'usia' => 'anak',
                'dosis_rendah' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_sedang' => '2x Sehari, 2 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 3 semprot / inhalasi',
            ),
            7 => 
            array (
                'id' => '8',
                'obat' => '4',
                'kandungan' => 'Budesonide 80 mcg, Formoterol Fumarate 4.5 mcg',
                'usia' => 'dewasa',
                'dosis_rendah' => '2x Sehari, 2 semprot / inhalasi',
                'dosis_sedang' => '2x Sehari, 3 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 3 semprot / inhalasi',
            ),
            8 => 
            array (
                'id' => '9',
                'obat' => '5',
                'kandungan' => 'Budesonide 160 mcg, Formoterol Fumarate 4.5 mcg',
                'usia' => 'anak',
                'dosis_rendah' => NULL,
                'dosis_sedang' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 2 semprot / inhalasi',
            ),
            9 => 
            array (
                'id' => '10',
                'obat' => '5',
                'kandungan' => 'Budesonide 160 mcg, Formoterol Fumarate 4.5 mcg',
                'usia' => 'dewasa',
                'dosis_rendah' => '2x Sehari, 1 semprot / inhalasi',
                'dosis_sedang' => '2x Sehari, 2 semprot / inhalasi',
                'dosis_tinggi' => '2x Sehari, 3 semprot / inhalasi',
            ),
        ));
        
        
    }
}