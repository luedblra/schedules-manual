<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
     * Seed the application's database.
     *
     * @return void
     */
   public function run()
   {
      $this->call(UsersTableSeeder::class);
      $this->call(CountriesTableSeeder::class);
      $this->call(HarborsTableSeeder::class);
      $this->call(CarriersTableSeeder::class);
      $this->call(RoutesTypesTableSeeder::class);
      $this->call(AccountSchedulesTableSeeder::class);
       $this->call(OauthClientsTableSeeder::class);
        $this->call(CredentialsApiTableSeeder::class);
    }
}
