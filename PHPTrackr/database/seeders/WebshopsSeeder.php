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
        Webshop::create([
            'name' => 'Koffieshop',
            'city' => 'Den Bosch',
            'street' => 'EenStraatInDenBosch',
            'housenumber' => '69',
        ]);
        Webshop::create([
            'name' => 'Fietsenwinkel',
            'city' => 'Rotterdan',
            'street' => 'Blaak',
            'housenumber' => '420',
        ]);
    }
}
