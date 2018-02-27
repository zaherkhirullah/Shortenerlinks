<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Options;
class OptionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = new \App\Http\Models\Options();
        $option->name='site_name';
        $option->display_name='Site Name';        
        $option->value='Shortener';
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='captcha_site_key';
        $option->display_name='Capatcha site key';        
        $option->value='6LcF5EUUAAAAAJ_qkzlldZkWkKuiTMXErAeM1Nj5';
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='captcha_secret_key';
        $option->display_name='Captcha secret key';        
        $option->value='';
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='Link_Timer';
        $option->display_name='Timer for link visitor';        
        $option->value=5;
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='count_visit_link';
        $option->display_name='How many Allow visit link';        
        $option->value=1;
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='count_visit_file';
        $option->display_name='How many Allow visit file';        
        $option->value=1;
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='count_download_file';
        $option->display_name='How many Allow download file';        
        $option->value=3;
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='ref_earnings';
        $option->display_name='referral earnings per houndred %';
        $option->value=3;
        $option->save();
        

    }
}
