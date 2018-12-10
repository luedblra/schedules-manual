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
                'password' => '$2y$10$/1ZBGWLYgiLg10nFOUfuduAzrE3mu.6Hx0w.w52rfszR23YxLpNim',
                'remember_token' => NULL,
                'created_at' => '2018-12-07 18:23:31',
                'updated_at' => '2018-12-07 18:23:31',
            ),
        ));
        
        
    }
}