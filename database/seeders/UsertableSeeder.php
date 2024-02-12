<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mbuci',
            'role_id' => '1',
            'email' => 'mbuci@gmail.com',
            'password' => Hash::make('mbuci123'),
            'about' => 'Simple About Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Teacher',
            'role_id' => '2',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('teacher123'),
            'about' => 'Simple About Teacher'
        ]);

        DB::table('users')->insert([
            'name' => 'Student',
            'role_id' => '3',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student123'),
            'about' => 'Simple About Student'
        ]);
    }
}
