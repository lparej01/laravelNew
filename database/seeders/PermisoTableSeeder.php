<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Permiso;
use Illuminate\Support\Facades\DB;

class PermisoTableSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //###1##//        
        DB::table('permiso')->insert([           
            'nombre'  => 'create', 
            'status' => 1,                                         
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //###2##//
        DB::table('permiso')->insert([           
            'nombre'  => 'delete', 
            'status' => 1,                                              
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //###3##//
        DB::table('permiso')->insert([           
            'nombre'  => 'edit',
            'status' => 1,                                            
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //###4##//
        DB::table('permiso')->insert([           
            'nombre'  => 'assignment',
            'status' => 1,                                            
            'created_at' => now(),
            'updated_at' => now()
        ]);
           //###5##//
         DB::table('permiso')->insert([           
            'nombre'  => 'disable',
            'status' => 1,                                        
            'created_at' => now(),
            'updated_at' => now()
        ]); 
        //###6##//
        DB::table('permiso')->insert([           
            'nombre'  => 'show',
            'status' => 1,                                        
            'created_at' => now(),
            'updated_at' => now()
        ]);  
           
          
       
        
    }
}
