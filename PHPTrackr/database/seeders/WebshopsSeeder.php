<?php

namespace Database\Seeders;

use App\Models\Webshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebshopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Webshop::create([
            'name' => 'Dierenwinkel',
            'city' => 'Gouda',
            'street' => 'Bloemendaalseweg',
            'housenumber' => '5',
        ]);
    }
}
