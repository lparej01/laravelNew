<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Auth\Rol;

class RolesSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Estatus de Roles
        DB::table('rol')->insert([
            'nombre'    => 'Administrator',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
         //Estatus de Roles
         DB::table('rol')->insert([
            'nombre'    => 'Users',
            'created_at' => now(),
            'updated_at' => now()            
        ]);
       

    }
}
