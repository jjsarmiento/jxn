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
        /*
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        */
        DB::table('users')->insert([
            'name'      => 'JXN',
            'email'     => 'jxnsarmiento@gmail.com',
            'role'      => 'MASTER',
            'password'  => \Illuminate\Support\Facades\Hash::make('pogiako1110'),
        ]);
    }
}
