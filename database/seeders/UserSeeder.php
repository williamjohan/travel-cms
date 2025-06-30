<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //dynamic generate data
        User::factory(10)->create();

        //static generate data
        User::create(
            [
                'name' => 'Admin Johan',
                'email' => 'william@example.com',
                'password' => Hash::make('12345678'),
                'roles' => 'admin',
                'phone' => '08123456789',
            ]
        );

        User::insert([
            [
                'name' => 'Johan',
                'email' => 'a@b.cd',
                'password' => Hash::make('12345678'),
                'roles' => 'user',
                'phone' => '08123456789',
            ],
            [
                'name' => 'Brodyy',
                'email' => 'b@b.cde',
                'password' => Hash::make('12345678'),
                'roles' => 'user',
                'phone' => '08123456789',
            ]
        ]);
    }
}
