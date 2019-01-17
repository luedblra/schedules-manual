<?php

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_clients')->delete();
        
        \DB::table('oauth_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Password Grant Tokens',
                'secret' => 'MrGWuViDv1r8LI8ETzceRHTfpC48Nn7hm4GeAIBA',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2019-01-17 13:44:42',
                'updated_at' => '2019-01-17 13:44:42',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Password Grant Tokens',
                'secret' => 'Pvy586P5wGuoLHcw1ERrmOAdCGolyVX6OrJd9PSd',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2019-01-17 18:38:22',
                'updated_at' => '2019-01-17 18:38:22',
            ),
        ));
        
        
    }
}