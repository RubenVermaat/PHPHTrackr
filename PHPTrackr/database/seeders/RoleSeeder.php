<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Roles::create([
            'name' => 'Admin', 
            'description' => 'lees en scrhijf rechten + more ' 
            
        ]);

        Roles::create([
            'name' => 'Adminstratief', 
            'description' => 'lees en scrhijf rechten' 
            
        ]);

        Roles::create([
            'name' => 'Inpakker', 
            'description' => 'lees rechten' 
            
        ]);
   
    }
}
