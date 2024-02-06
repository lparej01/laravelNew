<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios\SoporteTecnico\Incidencias;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $inc= Incidencias::getAllIncidencias();

      $incidencias = serializeJson($inc);         
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


      return view('servicios/incidencias/index',compact('incidencias','actions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.incidencias.create');
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

        

        DB::table('incidencias')->insert([
            'nombre'  => $request->nombre,           
            'created_at' => now(),
            'updated_at' => now()
                           
           
        ]);                     
                         
      
        
  
        return redirect()->route('incidencias.list')->with('success', 'El nuevo tipo de incidencia se creo correctamente');


                 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incidencias =Incidencias::getIncidenciasId($id);    
        
       // dd(  $incidencias );
 
        return view('servicios.incidencias.show',compact('incidencias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){


       
        $incidencias= Incidencias::getIncidenciasId($id);       
       
        return view('servicios.incidencias.edit',compact('incidencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $messages = [
            'nombre.regex'                => 'El nombre no debe contener caracteres especiales',
            'nombre.required'             => 'El nombre debe ser requerido',
            
        ];

        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z\s]+$/']            
        ], $messages); 


            
            $object = new Incidencias; 
            $Object = Incidencias::find($id);
            $Object ['nombre']  =  $request->nombre;           
            $Object ->save();

          
            return redirect()->route('incidencias.list')->with('success', 'Actualización realizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('servicios.incidencias.delete', compact('id'));
    }

    public function delete_confirm($id)
    {

            $incidencias= Incidencias::deleteInicidencia($id);

            if ($incidencias) {
                return redirect()->route('incidencias.list')->with('success', 'Incidencia eliminada exitosamente');
            } else {
                return redirect()->route('incidencias.list')->with('info', 'Verifique los datos');
            }

           
            

    }
            

        
}
