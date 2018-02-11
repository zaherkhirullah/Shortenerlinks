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
        $role->name='user';
        $role->slug='User';
        $role->save();
        $role->name='admin';
        $role->slug='Admin';
        $role->save();
       
    }
}
