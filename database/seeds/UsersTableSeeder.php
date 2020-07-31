<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Ad Nhi',
            'username' => 'ad_Nhi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('@dminNhi'),
            'is_admin' => 1
        ]);
    }
}
