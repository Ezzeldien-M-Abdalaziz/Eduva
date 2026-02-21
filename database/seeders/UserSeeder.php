<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $users =   [
            [
                'name' => 'student1',
                'email' => 'student1@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'student'
            ],
              [
                  'name' => 'Instructor1',
                  'email' => 'Instructor1@gmail.com',
                  'password' => bcrypt('123456'),
                  'role' => 'instructor'
              ],
        ];

       User::insert($users);
    }
}
