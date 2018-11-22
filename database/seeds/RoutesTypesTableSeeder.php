<?php

use Illuminate\Database\Seeder;

class RoutesTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('routes_types')->delete();
        
        \DB::table('routes_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'direct',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'transfer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}