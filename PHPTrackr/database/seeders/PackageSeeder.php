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
            'webshopName' => 'Package1'
        ]);
        Package::create([
            'webshopName' => 'Package2'
        ]);
        Package::create([
            'webshopName' => 'Package3'
        ]);
    }
}
