<?php

namespace Database\Seeders;

use App\Models\Label;
use Carbon;
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
            'status' => 'Aangemeld'
        ]);
        Label::create([
            'packageId' => '2',
            'status' => 'Aangemeld'
        ]);
        Label::create([
            'packageId' => '2',
            'shop' => 'Dierenwinkel'
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
            'shop' => 'Dierenwinkel',
            'status' => 'Afgeleverd'
        ]);
    }
}
