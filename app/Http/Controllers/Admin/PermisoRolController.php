<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\PermisoRol;
use App\Models\Admin\Permiso;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\UsersRol;


class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        $query = DB::raw("(CASE WHEN permiso_rol.status=1  THEN 'Activo' WHEN permiso_rol.status=0 THEN 'Inactivo' ELSE '' END)");


       $permiso_roles = DB::table('permiso_rol')      
      ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id') 
      ->join('rol', 'permiso_rol.rol_id', '=', 'rol.id')   
      ->select('permiso_rol.id','permiso_rol.status as estado','permiso.nombre','rol.nombre as rol',DB::raw("(CASE WHEN permiso_rol.status =1  THEN 'Activo' WHEN permiso_rol.status=0 THEN 'Inactivo' END) as estado"))      
      ->get();   

       $permisos_rol = serializeJson($permiso_roles);   

      // dd($permiso_roles);
             
      

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

        return view("admin.permisorol.index",compact('permisos_rol','actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permisos= Permiso::getPermisosAll();
        $roles= Rol::Roles();      

           /*  $permiso_rol = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id') 
             ->whereNotExists(function($query)
            {
                $query->from('permiso')
                    ->where('permiso.id = permiso_rol.permiso_id');
            })->get();
 
  

            dd($permiso_rol);
         */

        return view("admin.permisorol.create",compact('permisos','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      

        $permiso_rol = DB::table('permiso_rol')      
        ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id') 
        ->join('rol', 'permiso_rol.rol_id', '=', 'rol.id')  
        ->where('permiso_rol.id',$id) 
        ->select('permiso_rol.id','permiso.nombre as permiso','rol.nombre as rol',DB::raw("(CASE WHEN permiso_rol.status =1  THEN 'Activo' WHEN permiso_rol.status=0 THEN 'Inactivo' END) as estado"))      
        ->first();         
        
        

       //dd($permiso_rol );

        return view('admin.permisorol.show', compact('permiso_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)    {
       
       
        //$permiso_rol =PermisoRol::getId($id); 
        $permiso_rol = DB::table('permiso_rol')  
        ->select('permiso_rol.id',DB::raw("(CASE WHEN permiso_rol.status =1  THEN 'Activo' WHEN permiso_rol.status=0 THEN 'Inactivo' END) as status"))      
        ->where('permiso_rol.id',$id)
        ->first();   
        //dd( $permiso_rol );
              
      
        return view('admin.permisorol.edit', compact('permiso_rol','id'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
                         
            'status.required'=> 'El campo debe ser requerido',
           
            
        ];
        $request->validate([
            'status'           => ['required'],           
            
        ], $messages);

        $Object = PermisoRol::find($id);
        $Object ['status']  =  $request->status;           
        $Object ->save();  
       

        return redirect()->route('permiso.rol.list')->with('success', 'El Permiso Rol se actualizo  correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('admin.permisorol.delete', compact('id'));
    }

    public function delete_confirm($id)
    {

         $permiso_rol =PermisoRol::getId($id); 

        

         if ($permiso_rol->id =1) {
            $Object = PermisoRol::find($id);
            $Object ['status']  = 0;           
            $Object ->save();  
         }         
         else {

            $Object = PermisoRol::find($id);
            $Object ['status']  = 0;           
            $Object ->save(); 
            
         }
         
         return redirect()->route('permiso.rol.list')->with('success', 'El Permiso Rol se cambio el es estado');
        
       
    }
}
