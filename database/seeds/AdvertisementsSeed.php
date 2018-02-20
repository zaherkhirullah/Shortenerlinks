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
        $adv->value='<script data-cfasync="false" type="text/javascript" src="//p220333.clksite.com/adServe/banners?tid=IF1OUO_300X250"></script>';
        $adv->rank=1;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_link_2';
        $adv->value='<script type="text/javascript" src="https://toro-tags.com/_tags/jstags.js?s=mx/ouo/300250"></script>';
        $adv->rank=2;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_link_3';
        $adv->value='<script data-cfasync="false" type="text/javascript" src="//p220333.clksite.com/adServe/banners?tid=IF1OUO_300X250"></script>';
        $adv->rank=3;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_file_1';
        $adv->value='<script type="text/javascript" src="https://toro-tags.com/_tags/jstags.js?s=mx/ouo/300250"></script>';
        $adv->rank=1;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_file_2';
        $adv->value='<script data-cfasync="false" type="text/javascript" src="//p220333.clksite.com/adServe/banners?tid=IF1OUO_300X250"></script>';
        $adv->rank=2;
        $adv->save();
        $adv = new \App\Http\Models\advertisements();
        $adv->name='ad_file_3';
        $adv->value='<script type="text/javascript" src="https://toro-tags.com/_tags/jstags.js?s=mx/ouo/300250"></script>';
        $adv->rank=3;
        $adv->save();
    }
}
