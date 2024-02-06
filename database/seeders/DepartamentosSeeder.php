<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert([           
            'nombre'    => 'Gerencia General',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Finanzas',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Mercadeo',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Ventas',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Almacen',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Distribucion',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Seguridad Industrial',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Control de Calidad',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Mantenimiento',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'RRHH',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Planificacion',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);           
        DB::table('departamentos')->insert([           
            'nombre'    => 'Frugal',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Alimentos la Giralda',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Cuentas por Cobrar',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Compras',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Operaciones',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Beneficiadora',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Contabilidad',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Logistica',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'I&D',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Agricola la Giralda',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Produccion',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Deposito la Victoria',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Materia Prima',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Tesoreria',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Contraloria',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('departamentos')->insert([           
            'nombre'    => 'Sin Origen',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);

        DB::table('empresas')->insert([           
            'empresa'    => 'Beneficiadora',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('empresas')->insert([           
            'empresa'    => 'Frugal',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('empresas')->insert([           
            'empresa'    => 'Agrícola La Giralda',            
            'created_at' => now(),
            'updated_at' => now()           
        ]);
       
       
    }
}
