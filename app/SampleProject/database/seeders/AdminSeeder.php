<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
              'name' => 'adminSample1',
              'email' => 'adminSample1@email.com',
              'password' => Hash::make('adminSample1'),
            ],

            [
               'name' => 'adminSample2',
               'email' => 'adminSample2@email.com',
               'password' => Hash::make('adminSample2'),
            ],

            [
               'name' => 'adminSample3',
               'email' => 'adminSample3@email.com',
               'password' => Hash::make('adminSample3'),
            ],
          ]);
    }
}
