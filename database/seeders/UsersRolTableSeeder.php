<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\UsersRol;
use Illuminate\Support\Facades\DB;

class UsersRolTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users_rol')->insert([           
            'rol_id'  => 1,
            'usuario_id' => 1, 
            'estado' => true,                             
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('users_rol')->insert([           
            'rol_id'  => 2,
            'usuario_id' => 2, 
            'estado' => true,                             
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
