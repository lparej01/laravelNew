<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\Servicios\SoporteTecnico\AsignacionEquipo;
use Illuminate\Support\Facades\DB;

class AsignacionEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $asig= AsignacionEquipo::getAllEquipos();
        $asignacion= serializeJson($asig);  
        
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


                
         return view('servicios/asignacion/index',compact('asignacion','actions')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios/asignacion/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

       $messages = [
       
        'equipo_asignado_person.required'    => 'La persona o entidad debe ser requerida',
        'teclado_serial.required'               => 'El Serial del teclado debe ser requerido',
        'cpu_serial.required'            => 'El Serial del CPU es requerido',
        'procesador.required'            => 'El tipo de procesador es requerido',
        'disco.required'                => 'El tamaño del disco es requerido',
        'any_desk.required'                => 'El Codigo del Any es requerido',
        'correo_electronico.required'        => 'El correo es requerido',
        'correo_electronico.email'        => 'El correo no es valido',
       
    ];

    $request->validate([
        'equipo_asignado_person'  => ['required'] ,
        'teclado_serial'  => ['required'] ,
        'cpu_serial'  => ['required'] ,
        'procesador'  => ['required'] ,
        'disco'  => ['required'] ,
        'any_desk' => ['required'] ,
        'correo_electronico'  => ['required','email'] 
        
        


    ], $messages);

   if($request->tipo_equipo =="Tipo Pc"){
     $tipo_equipo="Tipo Pc";


   }
   if($request->tipo_equipo =="Tipo  Laptop"){

     $tipo_equipo="Tipo  Laptop";
   }

   dd( $request->all());


    
     DB::table('equipos_asignados')->insert([
        'equipo_asignado_person'  => $request->equipo_asignado_person, 
        'tipo_equipo'  => $tipo_equipo,    
        'teclado_serial'  => $request->teclado_serial,    
        'mouse'  => $request->nombre,    
        'cpu_serial'  => $request->nombre,    
        'conector_internet'  => $request->nombre,    
        'conector_corriente_cpu'  => $request->nombre,    
        'conector_corriente_monitor'  => $request->nombre,    
        'conector_cpu_monitor'  => $request->nombre,  
        'status'  => $request->nombre, 
        'procesador'  => $request->procesador, 
        'disco'  => $request->disco,
        'any_desk'  => $request->any_desk,
        'correo_electronico'  => $request->correo_electronico,             
        'created_at' => now(),
        'updated_at' => now()
                       
       
    ]);                     
                     
  
    

    return redirect()->route('asignacion.list')->with('success', 'Se ingreso el Equipo al sistema');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
