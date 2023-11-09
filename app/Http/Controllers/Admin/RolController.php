<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\Admin\Permiso;
use Illuminate\Support\Facades\DB;


class RolController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        $consulta = Rol::Roles();

        $rols = serializeJson($consulta);
        
        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        /**
         * 
         * Permisos de los roles
         * 
         */
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

      
     
        return view('admin.rol.index', compact('rols', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

       return view('admin.rol.create');

        

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        
        $messages = [
            'nombre.regex' => 'El campo no debe contener caracteres especiales', 'nombre.min' => 'El Código debe contener 3 caracteres', 'code.max' => 'El nombre del rol debe contener mas de 3 caracteres',              
            'nombre.required'=> 'El campo debe ser requerido', 'code.unique' => 'El código ya se encuentra asignado a un Rol',
           
            
        ];
        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/', 'unique:rol', 'min:3', 'max:20'],
                
            
        ], $messages);

        $getObtenerIdRol= DB::table('rol')
       ->insertGetId([           
            'nombre'  => $request->nombre,                     
            'created_at' => now(),
            'updated_at' => now()
        ]);        

        $permiso= DB::table('permiso')->get();

        
        foreach ($permiso as $items) {

            DB::table('permiso_rol')->insert([
                'rol_id'  => $getObtenerIdRol,
                'permiso_id' =>$items->id,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now()                      
               
            ]); 
            
        }              
       

        return redirect()->route('rol.list')->with('success', 'El rol se creo correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rol = Rol::getRolId($id);

       //dd($rol );

        return view('admin.rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
        
         $rolid= Rol::getRolId($id);

        

        if ($rolid->nombre !='Administrator') {
           
            return view('admin.rol.edit', compact('rolid','id'));
          

        } else {

           return redirect()->route('rol.list')->with('warning', 'No esta autorizado para editar este rol');
        }   
       
        
       
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $messages = [
            'nombre.regex'                => 'El campo no debe contener caracteres especiales',
            'nombre.required'             => 'El campo debe ser requerido',
            
        ];

        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/']            
        ], $messages);


                 

          
            $Object = Rol::find($id);
            $Object ['nombre']  =  $request->nombre;           
            $Object ->save();

          
            return redirect()->route('rol.list')->with('success', 'Actualización realizada exitosamente');
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        return view('admin.rol.delete', compact('id'));
    }

    public function delete_confirm($id)
    {

        $permisoDelete = 2;  
        $usuario_id= user()->id; 
        $rol = UsersRol::getUserRolId($usuario_id);
        //busco el rol y el permiso de eliminar
        $permisoRol = PermisoRol::getPermisoRol($rol->rol_id,$permisoDelete);
       

       
        
        if ($permisoRol->permiso_id ==2) {
            

            $obtenerol=Rol::getRolId($id);    

          
            if($obtenerol->nombre =="Administrator"){
                return redirect()->route('rol.list')->with('warning', 'No esta autorizado para eliminar el rol');
                
            }else{    

                /* aqui borra los permisos que tiene creado para ese rol*/
                $permiso= DB::table('permiso_rol')->where('rol_id',$id)->delete();

                if($permiso){
                    Rol::find($id)->delete();

                }else{
                    Rol::find($id)->delete();

                }       

           
            return redirect()->route('rol.list')->with('success', 'Rol eliminado exitosamente');

            }
            

        } else {

           return redirect()->route('rol.list')->with('warning', 'No esta autorizado para eliminar el rol');
        }   
       
       
    }
}
