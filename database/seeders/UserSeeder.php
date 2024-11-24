<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'interia js',
                'email' => 'interia@gmail.com',
                'password' => Hash::make('interia2024')
            ]
        ];


        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], 
                $user
            );
        }
    }
}
