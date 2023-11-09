<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Menu;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //*****Menu**********
          DB::table('menu')->insert([           
            'nombre'    => 'Administrador',
            'url'    => '#administrador',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'administrador',
            'created_at' => now(),
            'updated_at' => now()           
        ]);

        DB::table('menu')->insert([           
            'nombre'    => 'Rol',
            'url'    => 'rol.list',           
            'icono'    => 'imagenes/qYOn7yLBqQ2P6jXStkldcYvSTOkJ2nwA1tHsDf9X.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([           
            'nombre'    => 'Permiso',
            'url'    => 'permiso.list',            
            'icono'    => 'imagenes/eXW2yS6NoIChzfuUaB0u3dajQ8WQWUGJJ8lU8v52.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([  
            'nombre'    => 'PermisoRol',
            'url'    => 'permiso.rol.list',            
            'icono'    => 'imagenes/rjgYVkTzFaQsW9yhqHTIcPLciG9xNoVrAb2DgKvW.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([     
            'nombre'    => 'Usuarios',
            'url'    => 'user.list',           
            'icono'    => 'imagenes/RnW0TiO88YqjNL9s5USaoFc5MnNUY8DMAj40tZMx.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([           
            'nombre'    => 'Menu',
            'url'    => 'menu.list',            
            'icono'    => 'imagenes/xaNHlaZKiM0vQA18CvAbbCBGUnMdCoDf5fGufWxf.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([           
            'nombre'    => 'MenuRol',
            'url'    => 'menu_rol.list',            
            'icono'    => 'imagenes/xaNHlaZKiM0vQA18CvAbbCBGUnMdCoDf5fGufWxf.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([           
            'nombre'    => 'Auditoria',
            'url'    => 'audits',            
            'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);

        DB::table('menu')->insert([           
            'nombre'    => 'UsuariosRol',
            'url'    => 'users.rol.list',            
            'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);

         //*****Menu**********
         DB::table('menu')->insert([           
            'nombre'    => 'Registros',
            'url'    => '#registros',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'registros',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        ////###sub menu de Registros##########
        DB::table('menu')->insert([           
            'nombre'    => 'Categorias',
            'url'    => 'categorias.list',            
            'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
       
        DB::table('menu')->insert([           
            'nombre'    => 'Proveedores',
            'url'    => 'proveedores.list',            
            'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([           
            'nombre'    => 'Catalogos',
            'url'    => 'catalogos.list',            
            'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        DB::table('menu')->insert([           
            'nombre'    => 'Periodo',
            'url'    => 'periodo.list',            
            'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
            'created_at' => now(),
            'updated_at' => now()           
        ]);



        DB::table('menu') ->where('id', 2)->update([           
            'menu_id'    => 1,
                
        ]);

        DB::table('menu') ->where('id', 3)->update([           
            'menu_id'    => 1,
                
        ]);

        DB::table('menu') ->where('id', 4)->update([           
            'menu_id'    => 1,
                
        ]);
        DB::table('menu') ->where('id', 5)->update([           
            'menu_id'    => 1,
                
        ]);
        DB::table('menu') ->where('id', 6)->update([           
            'menu_id'    => 1,
                
        ]);
        DB::table('menu') ->where('id', 7)->update([           
            'menu_id'    => 1,
                
        ]);
        DB::table('menu') ->where('id', 8)->update([           
            'menu_id'    => 1,
                
        ]);
        DB::table('menu') ->where('id', 9)->update([           
            'menu_id'    => 1,
                
        ]);


         DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => '1',            
                   
        ]);
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => '2',            
                   
        ]); 
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 3,            
                   
        ]); 
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 4,            
                   
        ]); 
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 5,            
                   
        ]); 
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 6,            
                   
        ]); 
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 7,            
                   
        ]);  
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 8,            
                   
        ]);  
        DB::table('menu_rol')->insert([           
            'rol_id'    => 1,
            'menu_id'    => 9,            
                   
        ]);  
       
    }
}
