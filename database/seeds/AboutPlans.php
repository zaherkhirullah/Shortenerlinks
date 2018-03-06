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
       $aboutPlan = new \App\Http\Models\aboutPlan();
       $aboutPlan->name='Link stats';
       $aboutPlan->description='About Link stats ';
       $aboutPlan->save();
       $aboutPlan = new \App\Http\Models\aboutPlan();
       $aboutPlan->name='Referral earnings';
       $aboutPlan->description='About Referral earnings';
       $aboutPlan->save();
       $aboutPlan = new \App\Http\Models\aboutPlan();
       $aboutPlan->name='Custom alias';
       $aboutPlan->description='About Custom alias';
       $aboutPlan->save();
       $aboutPlan = new \App\Http\Models\aboutPlan();
       $aboutPlan->name='Edit uploaded files';
       $aboutPlan->description='About Edit uploaded files';
       $aboutPlan->save();
       $aboutPlan = new \App\Http\Models\aboutPlan();
       $aboutPlan->name='Edit short link';
       $aboutPlan->description='Edit short link';
       $aboutPlan->save();
    }
}
