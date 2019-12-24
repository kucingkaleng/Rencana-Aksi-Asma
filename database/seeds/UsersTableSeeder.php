<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1',
                'email' => 'ade@gmail.com',
                'password' => '$2y$10$9FJcvqejgY65yb1zolFPSOJNxO.qvpNAvPtJnuzcO9DCVSxFsM/Wi',
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU2NjQ3NjQ1NSwibmJmIjoxNTY2NDc2NDU1LCJqdGkiOiJCV2k0Rk9aOUs2eld3bzl6Iiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.HX9yhrI5jssyKEmHjf1GZnDemSJTtnBEtdGBqlqLy60',
                'created_at' => '2019-08-22 10:02:47',
                'updated_at' => '2019-08-22 12:20:55',
            ),
            1 => 
            array (
                'id' => '2',
                'email' => 'aher@fittechinova.com',
                'password' => '$2y$10$hZi.k8XJ2zMn4bNtJJE7I.ZdbjV/yHh03mMIsNe9xnHZts3fuCSWK',
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yYWEuZml0dGVjaGlub3ZhLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU2ODA5NzI4MiwibmJmIjoxNTY4MDk3MjgyLCJqdGkiOiJ5Y0pCbFZjNXRSRkhJVnh2Iiwic3ViIjoyLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.BmWQOWB-HiQEGgqAf22pxjZap6OWbeGrjWg_rhUawhI',
                'created_at' => '2019-09-10 06:34:18',
                'updated_at' => '2019-09-10 06:34:42',
            ),
            2 => 
            array (
                'id' => '3',
                'email' => 'aisyahnurulamalia@gmail.com',
                'password' => '$2y$10$l3CJ6TxNGnfau2620y3tQeaw4sx1dg7u9ODHRChmFGD8b28PirCg.',
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yYWEuZml0dGVjaGlub3ZhLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU3MjQzMjMwNywibmJmIjoxNTcyNDMyMzA3LCJqdGkiOiJTbXJCMDNlajRrdTNOZE80Iiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.C4qLSUBwn7uSuoB2xAMHiO--mugfoYqBW0PrzShToU8',
                'created_at' => '2019-10-30 10:44:24',
                'updated_at' => '2019-10-30 10:45:07',
            ),
            3 => 
            array (
                'id' => '4',
                'email' => 'kucingkalenk@gmail.com',
                'password' => '$2y$10$to06t90eKQI9eLkn.A/KuuUGCe3Owl77RAYBs5dLiatXvce5tECxK',
                'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yYWEuZml0dGVjaGlub3ZhLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU3Mjg1MDM0OSwibmJmIjoxNTcyODUwMzQ5LCJqdGkiOiJoNUR4cGVEcnROOHBDSzQ3Iiwic3ViIjo0LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.A-GLZQftcyxy4v6o50SpFTLHxo8CVf8hcPcjOjApV3g',
                'created_at' => '2019-11-04 06:52:21',
                'updated_at' => '2019-11-04 06:52:29',
            ),
        ));
        
        
    }
}