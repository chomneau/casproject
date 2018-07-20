<?php

use Illuminate\Database\Seeder;
use App\Employer;

class employerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Employer::create([
            'name'=>'employer',
            'email'=>'employer@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
