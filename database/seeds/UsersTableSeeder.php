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
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lWc9LW.KQCEMaypGz0gtVemL3nKk8PenVqWTM7kmKALunIfk7hckq',
                'remember_token' => 'kgLf48mgM6PWjYxFRNEpXVgrErSui9TW9TLanwobkfg4xLTwLRWDg0cTzQs9',
                'created_at' => '2018-11-20 13:18:24',
                'updated_at' => '2018-11-20 13:18:24',
            ),
        ));
        
        
    }
}