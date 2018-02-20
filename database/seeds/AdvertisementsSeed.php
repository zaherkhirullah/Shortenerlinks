<?php

use Illuminate\Database\Seeder;

class AdvertisementsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_link_1';
        $adv->value='';
        $adv->rank=1;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_link_2';
        $adv->value='';
        $adv->rank=2;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_link_3';
        $adv->value='';
        $adv->rank=3;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_file_1';
        $adv->value='';
        $adv->rank=1;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_file_2';
        $adv->value='';
        $adv->rank=2;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_file_3';
        $adv->value='';
        $adv->rank=3;
        $adv->save();
    }
}
