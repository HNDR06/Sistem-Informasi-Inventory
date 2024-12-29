<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert([
            [
                'userID' => 'bmu001',
                'username'  => 'Hendrawan',
                'email'  => 'hendrawanoktavianto786@gmail.com',
                'password'  => Hash::make('hendra123'),
                'role' => 'bmu_adfministrator',
                'picture' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
