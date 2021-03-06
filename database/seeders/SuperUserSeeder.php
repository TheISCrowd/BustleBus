<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create the super user for the web application
        DB::table('hrs')->insert([
            'name' => 'SuperUser',
            'email' => 'superuser@bustlebus.com',
            'password' => Hash::make('password'),
        ]);

        // Create the hr user for the web application
        DB::table('admins')->insert([
            'name' => 'AdminUser',
            'email' => 'admin@bustlebus.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'surname' => 'Doe',
            'cell' => '0845884750',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
