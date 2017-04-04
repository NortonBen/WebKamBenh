<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "admin",
            'last_name' => "admin",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'birthday' => Carbon::now(),
            'sex' => 1,
            'address' => "Hà Nam",
            'phone' => "093467689345485",
            'role_id' => 1
        ]);
    }
}
