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

        //*****Menu Padre********** ID 2
        DB::table('menu')->insert([           
            'nombre'    => 'Registros',
            'menu_id'    =>  0 ,            
            'url'    => '#registros',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'registros',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        //*****Menu Padre********** ID 3
        DB::table('menu')->insert([           
            'nombre'    => 'Transacciones', 
            'menu_id'    =>  0 ,           
            'url'    => '#transacciones',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'transacciones',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        //*****Menu Padre********** ID 4
        DB::table('menu')->insert([           
            'nombre'    => 'Produccion',
            'menu_id'    =>  0 ,            
            'url'    => '#produccion',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'produccion',
            'created_at' => now(),
            'updated_at' => now()           
        ]);
        //*****Menu Padre********** ID 5
        DB::table('menu')->insert([           
            'nombre'    => 'Reportes Disponibles', 
            'menu_id'    =>  0 ,           
            'url'    => '#reportes',            
            'icono'    => 'imagenes/iDeElzeYFYqDnTvV0RjgmrZjQ5CLUgjiFtoIZvRn.svg',
            'tipo'  => 'reportes',
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
                ////###sub menu de Registros##########
                DB::table('menu')->insert([           
                    'nombre'    => 'Categorias',
                    'menu_id'    =>  2 ,   //id menu padre
                    'url'    => 'categorias.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
            
                DB::table('menu')->insert([           
                    'nombre'    => 'Proveedores',
                    'menu_id'    =>  2 ,   //id menu padre
                    'url'    => 'proveedores.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Catalogos',
                    'menu_id'    =>  2 ,   //id menu padre
                    'url'    => 'catalogos.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Periodo',
                    'menu_id'    =>  2 ,   //id menu padre
                    'url'    => 'periodo.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                ////###sub menu de Transacciones##########
                DB::table('menu')->insert([           
                    'nombre'    => 'Pedidos',
                    'menu_id'    =>  3 ,  //id menu padre
                    'url'    => 'pedidos.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);            
                DB::table('menu')->insert([           
                    'nombre'    => 'Existencia',
                    'menu_id'    =>  3 ,   //id menu padre
                    'url'    => 'existencia.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Movimiento de Invetario',
                    'menu_id'    =>  3 ,   //id menu padre
                    'url'    => 'movinv.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                  

                ////###sub menu de Produccion ##########

                DB::table('menu')->insert([           
                    'nombre'    => 'Combos',
                    'menu_id'    =>  4 ,   //id menu padre
                    'url'    => 'combos.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Productos',
                    'menu_id'    =>  4,   //id menu padre
                    'url'    => 'productos.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                
               

                ////###sub menu de Reportes ##########    

               /*  DB::table('menu')->insert([           
                    'nombre'    => 'Resumen Proveedor',
                    'url'    => 'resprov.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Existencia SKU',
                    'url'    => 'existenciasku.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);

                DB::table('menu')->insert([           
                    'nombre'    => 'Existencia Categorias',
                    'url'    => 'existenciacateg.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Existencia Costo SKU',
                    'url'    => 'existenciacostosku.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
                DB::table('menu')->insert([           
                    'nombre'    => 'Existencia Costo Categoria',
                    'url'    => 'existenciacostocateg.list',            
                    'icono'    => 'imagenes/TqGDy2Ph3N5jM76GH8wq1tVa2OTkaEO7xCFYiXYs.svg',
                    'created_at' => now(),
                    'updated_at' => now()           
                ]);
 */

            ///########### Actualizar 26 + 4 = 30########################



          /*   DB::table('menu') ->where('id', 2)->update([           
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
            DB::table('menu') ->where('id', 10)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id',11)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 12)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 13)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 14)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 15)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 16)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 17)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 18)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 19)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 20)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 21)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 22)->update([           
                'menu_id'    => 1,
                    
            ]); */
         /*    DB::table('menu') ->where('id', 23)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 24)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 25)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 26)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 27)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 28)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 29)->update([           
                'menu_id'    => 1,
                    
            ]);
            DB::table('menu') ->where('id', 30)->update([           
                'menu_id'    => 1,
                    
            ]); */

            
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
           /*  DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 23,            
                    
            ]);  

            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 24,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 25,            
                    
            ]);
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 26,            
                    
            ]);  
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 27,            
                    
            ]);   
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 28,            
                    
            ]); 
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 29,            
                    
            ]);   
            DB::table('menu_rol')->insert([           
                'rol_id'    => 1,
                'menu_id'    => 30,            
                    
            ]);   */
       
       
    }
}
