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
            'shop' => 'Koffieshop',
            'status' => 'Onderweg'
        ]);
        Label::create([
            'packageId' => '2',
            'shop' => 'Dierenwinkel',
            'status' => 'Aangemeld'
        ]);
        Label::create([
            'packageId' => '3',
            'shop' => 'Dierenwinkel',
            'status' => 'Aangemeld'
        ]);
        Label::create([
            'packageId' => '4',
            'status' => 'Afgeleverd'
        ]);
    }
}
