<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
              'name' => 'userSample1',
              'email' => 'userSample1@email.com',
              'password' => Hash::make('userSample1'),
            ],

            [
               'name' => 'userSample2',
               'email' => 'userSample2@email.com',
               'password' => Hash::make('userSample2'),
            ],
          ]);
    }
}
