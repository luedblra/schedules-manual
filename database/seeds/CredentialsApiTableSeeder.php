<?php

use Illuminate\Database\Seeder;

class CredentialsApiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('credentials_api')->delete();
        
        \DB::table('credentials_api')->insert(array (
            0 => 
            array (
                'id' => 1,
                'auth_post' => 'http://sautomatic/',
                'client_id' => '2',
                'client_secret' => '4A8kVmi5V8U9wawEHTcrF4AWMf7sRxpUFVvkWrPE',
                'user_name' => 'user@example.com',
                'password' => 'secret',
                'url' => 'schedule/maersk',
                'carrier_id' => 12,
                'description' => 'Sutomatic Login',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}