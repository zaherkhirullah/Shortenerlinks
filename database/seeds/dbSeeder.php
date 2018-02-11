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
      
        $user = new \App\User();
        $user->first_name='zaher';
        $user->last_name='khirullah';
        $user->username='zaherkhirullah';
        $user->email='zahir.hayrallah@gmail.com';
        $user->role_id= 3;
        $user->affiliate_id= str_random(7);
        $user->password=bcrypt('Zz96321//');
        $user->save();
      
       
    }
}
