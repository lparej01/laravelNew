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
          //*****Menu padre********** ID 1
          DB::table('menu')->insert([           
            'nombre'    => 'Administrador', 
            'menu_id'    =>  0 ,           
            'url'    => '#administrador',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'administrador',
            'created_at' => now(),
            'updated_at' => now()           
        ]);     
     
        //*****Menu padre********** ID 1
        DB::table('menu')->insert([           
            'nombre'    => 'Soporte Tecnico', 
            'menu_id'    =>  0 ,           
            'url'    => '#soportetecnico',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'soportetecnico',
            'created_at' => now(),
            'updated_at' => now()           
        ]);     
     
        
      

        //####### Sub Menu  Administracción #################

                DB::table('menu')->insert([           
                    'nombre'    => 'Rol',
                    'menu_id'    =>  1 , //id menu padre
                    'url'    => 'rol.list',           
                    'icono'    => 'imagenes/qYOn7yLBqQ2P6jXStkldcYvSTOkJ2nwA1tHsDf9X.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Permiso',
                    'menu_id'    =>  1 ,  //id menu padre
                    'url'    => 'permiso.list',            
                    'icono'    => 'imagenes/eXW2yS6NoIChzfuUaB0u3dajQ8WQWUGJJ8lU8v52.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([  
                    'nombre'    => 'PermisoRol',
                    'menu_id'    =>  1 ,  //id menu padre
                    'url'    => 'permiso.rol.list',            
                    'icono'    => 'imagenes/rjgYVkTzFaQsW9yhqHTIcPLciG9xNoVrAb2DgKvW.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([     
                    'nombre'    => 'Usuarios',
                    'menu_id'    =>  1 ,  //id menu padre 
                    'url'    => 'user.list',           
                    'icono'    => 'imagenes/RnW0TiO88YqjNL9s5USaoFc5MnNUY8DMAj40tZMx.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Menu',
                    'menu_id'    =>  1 ,  //id menu padre
                    'url'    => 'menu.list',            
                    'icono'    => 'imagenes/xaNHlaZKiM0vQA18CvAbbCBGUnMdCoDf5fGufWxf.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'MenuRol',
                    'menu_id'    =>  1 ,  //id menu padre
                    'url'    => 'menu_rol.list',            
                    'icono'    => 'imagenes/xaNHlaZKiM0vQA18CvAbbCBGUnMdCoDf5fGufWxf.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Auditoria',
                    'menu_id'    =>  1 ,  //id menu padre
                    'url'    => 'audits',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);

                DB::table('menu')->insert([           
                    'nombre'    => 'UsuariosRol',
                    'menu_id'    =>  1 ,  //id menu padre
                    'url'    => 'users.rol.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);  
                
                DB::table('menu')->insert([           
                    'nombre'    => 'Gestion de Usuario',
                    'menu_id'    =>  2 ,  //id menu padre
                    'url'    => 'soporte.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);  
                
                DB::table('menu')->insert([           
                    'nombre'    => 'Asignacion de Equipos',
                    'menu_id'    =>  2 ,  //id menu padre
                    'url'    => 'asignacion.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                
                DB::table('menu')->insert([           
                    'nombre'    => 'Departamentos',
                    'menu_id'    =>  2 ,  //id menu padre
                    'url'    => 'departamentos.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);  
                DB::table('menu')->insert([           
                    'nombre'    => 'Incidencias',
                    'menu_id'    =>  2 ,  //id menu padre
                    'url'    => 'incidencias.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);      

               
                /////### menu rol ############
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

            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 10,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 11,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 12,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 13,            
                    
            ]);
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 14,            
                    
            ]); 
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 15,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 16,            
                    
            ]); 
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 17,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 18,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 19,            
                    
            ]);   
            
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 20,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 21,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 22,            
                    
            ]);  
               

              
           
 

           
       
       
    }
}
