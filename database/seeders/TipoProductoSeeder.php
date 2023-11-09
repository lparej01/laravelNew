<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Arroz Blanco",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Pasta Alimenticia",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Azucar refinada",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Aceite de Soya",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Harina de Trigo ",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Harina de Maiz Precocida",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Sardinas Tipo I ",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Frijol Chino",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Sardinas Tipo II",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);        
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Salsa Bologna ",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Salsa Napoli",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Salsa Ketchut ",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Salsa de Tomate",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Granos ",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Atun",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Cafe Molido",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Mayonesa",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Carne de almuerzo",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Aceite de Oliva",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipo_producto')->insert([           
            'tipo'  => "Leche en Polvo Entera",                                    
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
