<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        App\Admin::create([
//            'name'=>'admin',
//            'email'=>'admin@gmail.com',
//            'password'=>bcrypt('admin123'),
//            'admin'=>1
//        ]);

        $admin = App\Admin::create([
            'name'=>'Chomneau Men',
            'email'=>'menchomneau@gmail.com',
            'password'=>bcrypt('wEo9L3#k'),
            //'admin'=>1
        ]);

        App\AdminProfile::create([
            'admin_id' => $admin->id,
            'avatar'=> 'uploads/logos/1510817755img.png',
            'address'=> '#207, St.2011, Sensok, Phnom Penh',
            'phone'=>'015534040',
            'about'=>'I am administrator on this page'
        ]);
    }
}


