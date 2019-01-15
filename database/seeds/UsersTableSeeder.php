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
                'id' => 1,
                'name' => 'Administrator Schedules M',
                'email' => 'info@cargofive.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$jg/nwB0wZHrDX4gF6O7sI.aeMLoO5xyGTqCt5q6p3Jbaf4B5TWLQe',
                'remember_token' => 'xbCAQi1IIAVjxScxcLbDHMy50vclWKl96FBNMR6PfK3QrURdYI0isned8rPi',
                'created_at' => '2018-12-07 18:23:31',
                'updated_at' => '2018-12-07 18:23:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'API Schedules',
                'email' => 'user@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$29Eh5md7AmL/Oixae77Nm.CKiCL0AGpXWla5b.7ndF11I4oS9PeRO',
                'remember_token' => NULL,
                'created_at' => '2019-01-15 20:21:45',
                'updated_at' => '2019-01-15 20:21:45',
            ),
        ));
        
        
    }
}