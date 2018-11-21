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
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$fVHuTSystK4XmKngUWkliu5bPaDZwd2l00hqKRN0MeIP.tMxVtgdy',
                'remember_token' => NULL,
                'created_at' => '2018-11-21 12:33:28',
                'updated_at' => '2018-11-21 12:33:28',
            ),
        ));
        
        
    }
}