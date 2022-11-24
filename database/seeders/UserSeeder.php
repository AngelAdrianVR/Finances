<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            [
                'name' => 'Angel Vázquez',
                'email' => 'angelvazquez470@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789'),
                'created_at' => now(),
            ],
        ));
    }
}
