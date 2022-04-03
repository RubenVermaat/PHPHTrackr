<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'email' => 'James@gmail.com',
            'firstname' => 'James',
            'surname' => 'Gordon',
            'labelGenerated' => true
        ]);
        Package::create([
            'email' => 'Pieter@gmail.com',
            'firstname' => 'Pieter',
            'surname' => 'van Dijk'
        ]);
        Package::create([
            'email' => 'Ruben@gmail.com',
            'firstname' => 'Ruben',
            'surname' => 'Berg'
        ]);
        Package::create([
            'email' => 'Natalja@gmail.com',
            'firstname' => 'Natalja',
            'surname' => 'Pieterson'
        ]);
    }
}
