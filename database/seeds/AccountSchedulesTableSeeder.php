<?php

use Illuminate\Database\Seeder;

class AccountSchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('account_schedules')->delete();
        
        \DB::table('account_schedules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Manual Insertion',
                'date' => '2018-11-23',
                'user_id' => 1,
                'created_at' => '2018-11-23 00:00:00',
                'updated_at' => '2018-11-23 00:00:00',
            ),
        ));
        
        
    }
}