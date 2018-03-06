<?php

use Illuminate\Database\Seeder;

class PayMethods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name='Paypal';
        $PayMethod->min_amount=1;
        $PayMethod->save();

        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name='Skrill';
        $PayMethod->min_amount=10;
        $PayMethod->save();
        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name='Payza';
        $PayMethod->min_amount=10;
        $PayMethod->save();

        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name='Payoneer';
        $PayMethod->min_amount=20;
        $PayMethod->save();
        
        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name=' Vodafone Cash';
        $PayMethod->min_amount=5;
        $PayMethod->save();

        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name=' Etisalat Cash';
        $PayMethod->min_amount=5;
        $PayMethod->save();

        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name=' Orange Cash';
        $PayMethod->min_amount=5;
        $PayMethod->save();
        $PayMethod = new \App\Http\Models\PayMethod();
        $PayMethod->name=' Bank Transfer';
        $PayMethod->min_amount=500;
        $PayMethod->save();
        	

        
    }
}
