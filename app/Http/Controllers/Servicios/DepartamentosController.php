<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios\SoporteTecnico\Departamentos;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depart= Departamentos::getAllDepartamentos();
        $departamentos = serializeJson($depart);         
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


       // var_dump( $departamentos );




        return view('servicios/departamentos/index',compact('departamentos','actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.regex'                => 'El nombre no debe contener caracteres especiales',
            'nombre.required'             => 'El nombre debe ser requerido',
            
        ];

        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/']            
        ], $messages);
        
        DB::table('departamentos')->insert([
            'nombre'  => $request->nombre,           
            'created_at' => now(),
            'updated_at' => now()
                           
           
        ]);                     
                         
      
        
  
        return redirect()->route('departamentos.list')->with('success', 'El nuevo tipo de departamentos se creo correctamente');

                 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departamentos =Departamentos::getDepartamentosId($id);        
 
        return view('servicios.departamentos.show',compact('departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $departamentos= Departamentos::getDepartamentosId($id);       
       
        return view('servicios.departamentos.edit',compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nombre.regex'                => 'El campo no debe contener caracteres especiales',
            'nombre.required'             => 'El campo debe ser requerido',
            
        ];

        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/']            
        ], $messages);


                 

            $object = new Departamentos;  
            $Object = Departamentos::find($id);
            $Object ['nombre']  =  $request->nombre;           
            $Object ->save();

          
            return redirect()->route('departamentos.list')->with('success', 'Actualización realizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('servicios.departamentos.delete', compact('id'));
    }
    public function delete_confirm($id)
    {

            $departamentos= Departamentos::deleteDepartamentos($id);

            if ($departamentos) {
                return redirect()->route('departamentos.list')->with('success', 'Departamento eliminado exitosamente');
            } else {
                return redirect()->route('departamentos.list')->with('info', 'Verifique los datos no puede ser eliminado');
            }

           
            

    }
}
