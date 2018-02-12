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
        $option->value='Shortener';
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='Captcha_site_Key';
        $option->value='';
        $option->save();
        $option = new \App\Http\Models\Options();
        $option->name='Captcha_secret_Key';
        $option->value='';
        $option->save();
    }
}
