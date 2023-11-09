<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Permiso;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;


class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perm= Permiso::getPermisosAll();
        $permisos = serializeJson($perm);    
        
        //dd($permisos);

        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        $permisorol=PermisoRol::getPermisoRolId($user->rol_id);

        $permiso_status = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
            ->select('permiso.nombre', 'permiso_rol.*')
            ->where('permiso_rol.rol_id',$user->rol_id)
            ->get();  
      
            $array = array("can_create" => $permiso_status[0]->status, 
                        "can_edit" => $permiso_status[2]->status, 
                        "can_show" => $permiso_status[5]->status,
                        "can_disable" => $permiso_status[4]->status,
                        "can_delete" => $permiso_status[1]->status);    
                        
        $actions = serializeJson($array);

        return view("admin.permiso.index",compact('permisos', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.permiso.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.regex' => 'El campo no debe contener caracteres especiales', 'nokmbre.min' => 'El Código debe contener 3 caracteres', 'code.max' => 'El nombre del rol debe contener mas de 3 caracteres',              
            'nombre.required'=> 'El campo debe ser requerido', 'nombre.unique' => 'El nombre ya se encuentra asignado a un Rol',
           
            
        ];
        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/', 'unique:rol', 'min:3', 'max:20'],
            
            
        ], $messages);
                                //
         Permiso::create(['nombre' => strtolower($request->nombre),
        'status'=> 0,
        'created_at' => now(),
        'updated_at' => now()]);


        return redirect()->route('permiso.list')->with('success', 'El permiso se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permiso =Permiso::getPermisoId($id);        

        return view('admin.permiso.show', compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $usuario_id= user()->id; 
        $rol = UsersRol::getUserRolId($usuario_id);
        $permiso =Permiso::getPermisoId($id);            
        //dd($permiso->status);

        if ($permiso->status ==1) {
            return redirect()->route('permiso.list')->with('warning', 'No esta autorizado de cambiar este permiso');
        } else {
            return view('admin.permiso.edit', compact('permiso','id'));
        }
        
           
      
          

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //dd($request);
         $messages = [
            'nombre.regex'                => 'El campo no debe contener caracteres especiales',
            'nombre.required'             => 'El campo debe ser requerido',
            
        ];

        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/']            
        ], $messages);


                 

          
            $Object = Permiso::find($id);
            $Object ['nombre']  = strtolower( $request->nombre);           
            $Object ->save();

          
            return redirect()->route('permiso.list')->with('success', 'Actualización realizada exitosamente');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('admin.permiso.delete', compact('id'));
    }

    public function delete_confirm($id)
    {


       $estado = DB::table('permiso')->where('id', $id)->first();



       if($estado->status){

          return redirect()->route('permiso.list')->with('warning', 'No esta permitido eliminar este permiso');

       }else{

            $PermisoRol = PermisoRol::getPermiso($id);

            if ($PermisoRol) {

                return redirect()->route('permiso.list')->with('warning', 'No esta permitido eliminar este permiso tiene un rol asociado');
                
            } else {
                Permiso::find($id)->delete();              
                return redirect()->route('permiso.list')->with('success', 'Permiso eliminado exitosamente');
            }
          

       }

       
       
    }
    
}