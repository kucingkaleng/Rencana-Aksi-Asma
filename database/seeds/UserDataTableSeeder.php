<?php

use Illuminate\Database\Seeder;

class UserDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_data')->delete();
        
        \DB::table('user_data')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama' => 'Ade',
                'jk' => '1',
                'usia' => '6',
                'user' => '1',
            ),
            1 => 
            array (
                'id' => '2',
                'nama' => 'anto',
                'jk' => '1',
                'usia' => '10',
                'user' => '2',
            ),
            2 => 
            array (
                'id' => '3',
                'nama' => 'Aisyah Nurul Amalia',
                'jk' => '2',
                'usia' => '23',
                'user' => '3',
            ),
            3 => 
            array (
                'id' => '4',
                'nama' => 'Adeardo Dora Harnanda',
                'jk' => '1',
                'usia' => '22',
                'user' => '4',
            ),
        ));
        
        
    }
}