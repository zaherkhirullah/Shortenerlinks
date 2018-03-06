<?php

use Illuminate\Database\Seeder;

class dbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      

        $folder = new \App\Http\Models\folder();
        $folder->name = 'General';
        $folder->user_id =1; 
        $folder->save();
        
        $domain = new \App\Http\Models\Domain();
        $domain->name = 'This Domain' ;
        $domain->slug = url('/') ;
        $domain->url = url('/');
        $domain->save();
        
        $adstype = new \App\Http\Models\Adstype();
        $adstype->name='Banner';
        $adstype->description='Banner about some descriptions';
        $adstype->save();

        $role = new \App\Http\Models\role();
        $role->name='it';
        $role->slug='It';
        $role->save();
        $role->save();
        $role = new \App\Http\Models\role();
        $role->name='admin';
        $role->slug='Admin';
        $role->save();
        $role = new \App\Http\Models\role();
        $role->name='manager';
        $role->slug='Manager';
        $role->save();
        $role = new \App\Http\Models\role();
        $role->name='user';
        $role->slug='User';
        $role->save();

        $plan = new \App\Http\Models\plan();
        $plan->name='free';
        $plan->display_name='Visitors';
        $plan->space_size=1;
        $plan->monthly_price=0;
        $plan->yearly_price=0;
        $plan->save();
        $plan = new \App\Http\Models\plan();
        $plan->name='member';
        $plan->display_name='Members';
        $plan->space_size=100;
        $plan->monthly_price=6;
        $plan->yearly_price=72;
        $plan->save();
        $plan = new \App\Http\Models\plan();
        $plan->name='professional';
        $plan->display_name='Professional';
        $plan->space_size=1000;
        $plan->monthly_price=9.5;
        $plan->yearly_price=114;
        $plan->save();

        $user = new \App\User();
        $user->first_name='zaher';
        $user->last_name='khirullah';
        $user->username='zaherkhirullah';
        $user->email='zahir.hayrallah@gmail.com';
        $user->role_id= 1;
        $user->plan_id= 3;
        $user->affiliate_id= str_random(7);
        $user->password=bcrypt('Zz96321//');
        $user->save();
        
    
        $user = new \App\User();
        $user->first_name='The';
        $user->last_name='admin';
        $user->username='TheAdmin';
        $user->email='admin@admin.com';
        $user->role_id= 2;
        $user->plan_id= 3;
        $user->affiliate_id= str_random(7);
        $user->password=bcrypt('admin');
        $user->save();

        $profile = new \App\Profile();
        $profile->user_id=1;
        $profile->withdrawal_method_id=1;
        $profile->withdrawal_email='zahir.hayrallah@gmail.com';
        $profile->save();
        $address = new \App\Http\Models\address();
        $address->user_id=1;
        $address->save();
        $balance = new \App\Balance();
        $balance->user_id=1;
        $balance->avilable_amount=500;
        $balance->save();
        
        $profile = new \App\Profile();
        $profile->user_id=2;
        $profile->withdrawal_method_id=1;
        $profile->withdrawal_email='admin@admin.com';
        $profile->save();
        $address = new \App\Http\Models\address();
        $address->user_id=2;
        $address->save();
        $balance = new \App\Balance();
        $balance->user_id=2;
        $balance->avilable_amount=500;        
        $balance->save();
        
    }
}
