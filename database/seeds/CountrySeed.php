<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Services\Config;

class CountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new \App\Http\Models\Country();
        $country->name='others';
        $country->link_price=0.004;        
        $country->file_price=0.004;
        $country->save();
        $all = \Countries::all();
        foreach($all as $contry)
        {        
            $country = new \App\Http\Models\Country();
            $country->name=$contry->name->common;
            $country->link_price=0.004;        
            $country->file_price=0.004;
            $country->save();
        }
        
    }
}
