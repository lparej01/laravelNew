<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Menu;
use App\Models\Admin\Permiso;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        $permisorol=PermisoRol::getPermisoRolId($user->rol_id);

        $permiso_status = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
            ->select('permiso.nombre', 'permiso_rol.*')
            ->where('permiso_rol.rol_id',$user->rol_id)
            ->get();   


      
        //$array = array("can_query"=> 1, "can_insert"=>  $permiso_status[0]->status, "can_update"=>$permiso_status[3]->status,"can_delete"=>$permiso_status[1]->status);    
        $array = array("can_create" => $permiso_status[0]->status, 
        "can_edit" => $permiso_status[2]->status, 
        "can_show" => $permiso_status[5]->status,
        "can_disable" => $permiso_status[4]->status,
        "can_delete" => $permiso_status[1]->status);    
        
        $actions = serializeJson($array);

        $me = DB::table('menu')->get();
        
        $menu = Menu::getMenu();

       
        $menus = serializeJson($me); 
     
        return view('admin.menu.index', compact('menus','actions','menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.regex' => 'El nombre no debe contener caracteres especiales',               
            'nombre.required'=> 'El nombre debe ser requerido', 'nombre.unique' => 'El nombre ya se encuentra asignado a un Menu',                          
           /* 'url.unique'=> 'La Url  ya se encuentra asignado a un Menu',*/
            'icono.required'=> 'El Icono  debe ser requerido',
            'tipo.required'=> 'El tipo de menu es requerido'                          
            
        ];
        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/', 'unique:menu'],
           /*'url'           => ['unique:menu'],*/
            'icono'           => ['required','image','mimes:svg','max:3000'] ,
            'tipo'           => ['required'],        
            
            
        ], $messages);

        $tipo=strtolower($request->nombre);
       
        if ($request->tipo == 0) {
            $url="#". $tipo;
            $tipo;

        } else {
            $url=$request->url;
            $tipo;
        }
        
                                
      if($request->file("icono")){		   
		 
        $img = $request->file("icono")->store('imagenes','public'); 
       
        DB::table('menu')->insert([
            'nombre'  => $request->nombre,
            'url' =>  $url,
            'icono' => $img,
            'tipo' =>  $tipo,
            'created_at' => now(),
            'updated_at' => now()
                           
           
        ]);                     
                         
        }
        
  
        return redirect()->route('menu.list')->with('success', 'El menu se creo correctamente');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);

        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       

          /***con imagenes */
        if($request->file("icono")){		   
		 
            $img = $request->file("icono")->store('imagenes','public');

            $tipo=strtolower($request->nombre);

            $url="#". $tipo;           

            $menu= Menu::obtMenuId($id);
                

           
                if ($menu->menu_id ==0) {

                        $url="#". $tipo;

                        /**menu padre */      
                        Menu::findOrFail($id)->update([
                            'nombre'  => $request->nombre,
                            'url' =>  $url,
                            'tipo' => strtolower($request->nombre),
                            'icono' => $img
                                
                        
                        ]);    
                    
                } else {

                        /**menu hijo */      
                        Menu::findOrFail($id)->update([
                            'nombre'  => $request->nombre,
                            'url' =>  $request->url,
                            'icono' => $img               
                            
                        ]);            
                
                }
           
          

        }else{
                
            /***No tiene imagenes */            
            $tipo=strtolower($request->nombre);

            $menu= Menu::obtMenuId($id);

            $url="#". $tipo;   
        
                /***menu padre */
            if ($menu->menu_id ==0) {

               
                
                        /**menu padre */      
                        Menu::findOrFail($id)->update([
                            'nombre'  => $request->nombre,
                            'url' =>   $url,
                            'tipo' => $tipo
                          
                        
                        ]);    
                    
                } else {

                            
                        Menu::findOrFail($id)->update([
                            'nombre'  => $request->nombre,
                            'url' =>  $request->url               
                            
                        ]);            
                
                }
            


        }
            
        
        
       
        return redirect('admin/menu')->with('mensaje', 'Menú actualizado con exito');
    }
    /***
     * Guarda el oren del menu actualiza
     * 
     */
    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);           
         
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
    /**
     * Busca la pagina del menu dinamico
     * 
     */
    public function menu_dinamico(){

        $menu = Menu::getMenu();
       

        return view('admin.menu-dinamico.index', compact('menu'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('admin.menu.delete', compact('id'));
    
    
    
    }
    public function delete_confirm($id)
    {
         Menu::find($id)->delete();              
         return redirect()->route('menu.list')->with('success', 'Menu eliminado exitosamente');
    }
    
    
}
