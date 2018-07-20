<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Chomneau',
            'email' => 'menchomneau12@gmail.com',
            'password' => bcrypt('123456')
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar'=>'uploads/avatar/img.png',
            'first_name' => 'Chomneau',
            'last_name' => 'Men',
            'sex' => 'Male',
            'date_of_birth' => '2017-10-02',
            'phone' => '098747463',
            'address' => '$54, St. 271',
            'location' => 'Phnom Penh',
            'bio' => 'I am live in phnom penh I love coding to make amazing happen'
        ]);
    }
}
