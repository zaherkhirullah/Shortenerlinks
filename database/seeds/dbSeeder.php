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
        $role = new \App\Http\Models\role();
        $role->name='it';
        $role->slug='It';
        $role->save();
        $role = new \App\Http\Models\role();
        $role->name='user';
        $role->slug='User';
        $role->save();
        $role->save();
        $role = new \App\Http\Models\role();
        $role->name='admin';
        $role->slug='Admin';
        $role->save();

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

        $user = new \App\User();
        $user->first_name='zaher';
        $user->last_name='khirullah';
        $user->username='zaherkhirullah';
        $user->email='zahir.hayrallah@gmail.com';
        $user->role_id= 1;
        $user->affiliate_id= str_random(7);
        $user->password=bcrypt('Zz96321//');
        $user->save();

        $user = new \App\User();
        $user->first_name='The';
        $user->last_name='admin';
        $user->username='TheAdmin';
        $user->email='admin@admin.com';
        $user->role_id= 3;
        $user->affiliate_id= str_random(7);
        $user->password=bcrypt('admin');
        $user->save();
    }
}
