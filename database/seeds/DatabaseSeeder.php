<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
     {
         $this->call(dbSeeder::class);
         $this->call(CountrySeed::class);         
         $this->call(OptionsSeed::class);
         $this->call(AdvertisementsSeed::class);
         
    //      $this->call(UsersTableSeeder::class);
    //      $this->call(LinksTableSeeder::class);
    //      $this->call(filesTableSeeder::class);
    }
}
