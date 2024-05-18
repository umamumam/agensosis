<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'  => 'Admin',
                'email' => 'admin@gmail.com',
                'password'  => bcrypt('1234'),
                'role'  => 'admin'
            ],
            [
                'name'  => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password'  => bcrypt('1234'),
                'role'  => 'kasir'
            ],
        ]);
    }
}
