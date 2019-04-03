<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Admin',
                'user_name'=>'admin',
                'email'=>'admin@gmail.com',
                'user_type'=>0,
                'password'=>bcrypt('admin'),
            ],[
                'name'=>'Demo',
                'user_name'=>'demo',
                'email'=>'demo@gmail.com',
                'user_type'=>1,
                'password'=>bcrypt('demo'),
            ]

        ]);
    }
}
