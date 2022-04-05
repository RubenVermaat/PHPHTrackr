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
            'surname' => 'van Dijk',
            'labelGenerated' => true,
            'city' => 'Gouda',
            'street' => 'Blaak',
            'housenumber' => '24',
            'homedelivery' => true
        ]);
        Package::create([
            'email' => 'Ruben@gmail.com',
            'firstname' => 'Ruben',
            'surname' => 'Berg',
            'labelGenerated' => true
        ]);
        Package::create([
            'email' => 'Natalja@gmail.com',
            'firstname' => 'Natalja',
            'surname' => 'Pieterson',
            'labelGenerated' => true
        ]);
        Package::create([
            'email' => 'Lucas@gmail.com',
            'firstname' => 'Lucas',
            'surname' => 'Achterdocht'
        ]);
        Package::create([
            'email' => 'Marc@gmail.com',
            'firstname' => 'Marc',
            'surname' => 'met een C'
        ]);
        Package::create([
            'email' => 'Nathan@gmail.com',
            'firstname' => 'Nathan',
            'surname' => 'Ad Astra'
        ]);
        Package::create([
            'email' => 'Robbin@gmail.com',
            'firstname' => 'Robbin',
            'surname' => 'Blaak'
        ]);
        Package::create([
            'email' => 'Mariska@gmail.com',
            'firstname' => 'Mariska',
            'surname' => 'Samsung'
        ]);
        Package::create([
            'email' => 'Gert@gmail.com',
            'firstname' => 'Gert',
            'surname' => 'Manhout'
        ]);
        Package::create([
            'email' => 'James@gmail.com',
            'firstname' => 'James',
            'surname' => 'Pieterson'
        ]);
        Package::create([
            'email' => 'Koen@gmail.com',
            'firstname' => 'Koen',
            'surname' => 'van der Groen'
        ]);
    }
}
