<?php

use Illuminate\Database\Seeder;

class AboutPlans extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = new \App\Http\Models\abouPlan();
        $plan->name='Link stats';
        $plan->description='About Link stats ';
        $plan->save();
        $plan = new \App\Http\Models\abouPlan();
        $plan->name='Referral earnings';
        $plan->description='About Referral earnings';
        $plan->save();
        $plan = new \App\Http\Models\abouPlan();
        $plan->name='Custom alias';
        $plan->description='About Custom alias';
        $plan->save();
        $plan = new \App\Http\Models\abouPlan();
        $plan->name='Edit uploaded files';
        $plan->description='About Edit uploaded files';
        $plan->save();
        $plan = new \App\Http\Models\abouPlan();
        $plan->name='Edit short link';
        $plan->description='Edit short link';
        $plan->save();
    }
}
