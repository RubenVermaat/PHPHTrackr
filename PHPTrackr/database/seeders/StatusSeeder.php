<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Aangemeld'
        ]);
        Status::create([
            'name' => 'Uitgeprint'
        ]);
        Status::create([
            'name' => 'Afgeleverd'
        ]);
        Status::create([
            'name' => 'Sorteercentrum'
        ]);
        Status::create([
            'name' => 'Onderweg'
        ]);
    }
}
