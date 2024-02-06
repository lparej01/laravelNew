<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencias')->insert([           
            'nombre'    => 'Hardware',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('incidencias')->insert([           
            'nombre'    => 'Software',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('incidencias')->insert([           
            'nombre'    => 'Red',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('incidencias')->insert([           
            'nombre'    => 'Correo',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);       
        DB::table('incidencias')->insert([           
            'nombre'    => 'ERP',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('incidencias')->insert([           
            'nombre'    => 'Impresion',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('incidencias')->insert([           
            'nombre'    => 'Telefonia',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('incidencias')->insert([           
            'nombre'    => 'Servicios de Mantenimiento Web',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
    }
}
