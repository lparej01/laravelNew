<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;

class PermisoRolTableSeeder extends Seeder
{
    
   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permiso_rol')->insert([           
            'rol_id'  => 1,
            'permiso_id' => 1,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                      
           
        ]); 
        DB::table('permiso_rol')->insert([     
            'rol_id'  => 1,
            'permiso_id' => 2,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                      
           
        ]); 
        DB::table('permiso_rol')->insert([               
            'rol_id'  => 1,
            'permiso_id' => 3,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
        DB::table('permiso_rol')->insert([          
            'rol_id'  => 1,
            'permiso_id' => 4,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
        DB::table('permiso_rol')->insert([          
            'rol_id'  => 1,
            'permiso_id' => 5,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
        DB::table('permiso_rol')->insert([          
            'rol_id'  => 1,
            'permiso_id' => 6,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
       
       
       
        DB::table('permiso_rol')->insert([           
            'rol_id'  => 2,
            'permiso_id' => 1,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                      
           
        ]); 
        DB::table('permiso_rol')->insert([     
            'rol_id'  => 2,
            'permiso_id' => 2,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                      
           
        ]); 
        DB::table('permiso_rol')->insert([               
            'rol_id'  => 2,
            'permiso_id' => 3,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
        DB::table('permiso_rol')->insert([          
            'rol_id'  => 2,
            'permiso_id' => 4,
            'status' => 1,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
         DB::table('permiso_rol')->insert([              
            'rol_id'  => 2,
            'permiso_id' => 5,
            'status' => 0,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
        DB::table('permiso_rol')->insert([              
            'rol_id'  => 2,
            'permiso_id' => 6,
            'status' => 0,  
            'created_at' => now(),
            'updated_at' => now()                     
           
        ]); 
        
 
    }
}
