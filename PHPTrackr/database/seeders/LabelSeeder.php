<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Label::create([
            'packageId' => '1',
            'shop' => 'Koffieshop',
            'status' => 'Aangemeld'
        ]);
        Label::create([
            'packageId' => '2',
            'shop' => 'Fietsenwinkel',
            'status' => 'Aangemeld'
        ]);
        Label::create([
            'packageId' => '2',
            'shop' => 'Dierenwinkel'
        ]);
        Label::create([
            'packageId' => '3',
            'shop' => 'Dierenwinkel'
        ]);
        Label::create([
            'packageId' => '4',
            'shop' => 'Dierenwinkel'
        ]);
    }
}
