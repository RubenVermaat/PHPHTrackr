<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ruben',
            'email' => 'ruben.vanderhout@gmail.com',
            'password' => Hash::make('RubenTestPassword'), // password
            'remember_token' => Str::random(10),
            'role' => "Admin",
            'api_token' => Str::random(60)
        ]);
        \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => "Admin"
        ]);
    }
}
