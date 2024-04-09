<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\Servicios\SoporteTecnico\AsignacionEquipo;
use Illuminate\Support\Facades\DB;
use PDF;

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
            
            
        //dd( $permiso_status[6] );
        $array = array("can_create" => $permiso_status[0]->status, 
                        "can_edit" => $permiso_status[2]->status, 
                        "can_show" => $permiso_status[5]->status,
                        "can_disable" => $permiso_status[4]->status,
                        "can_delete" => $permiso_status[1]->status,
                        "can_pdf" => $permiso_status[6]->status
                    
                    ); 
        $actions = serializeJson($array);
        //dd(  $actions);

                
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
        'dominio_sistema.required'               => 'Verifique si esta en el dominio de la empresa',
        'oficina.required'               => 'La oficina es requerida',
        'tipo_equipo.required'               => 'Tipo de equipo es requerida',     
       
    ];

    $request->validate([
        'equipo_asignado_person'  => ['required'] ,
        'dominio_sistema'  => ['required'] ,
        'oficina'  => ['required'] ,
        'tipo_equipo'  => ['required']         
       
    ], $messages);

    //dd( $request->all());
      

  
   
     DB::table('equipos_asignados')->insert([
        'dominio_sistema'  => $request->dominio_sistema, 
        'equipo_asignado_person'  => strtoupper($request->equipo_asignado_person), 
        'oficina'  => $request->oficina, 
        'tipo_equipo'  => $request->tipo_equipo,  
        'teclado_serial'  => strtoupper($request->teclado_serial),
        'teclado_marca'  =>  strtoupper($request->teclado_marca),        
        'mouse_serial'  =>  strtoupper($request->mouse_serial),          
        'mouse_marca'  =>  strtoupper($request->mouse_marca),
        'monitor_serial'  =>  strtoupper($request->monitor_serial),
        'monitor_marca'  =>  strtoupper($request->monitor_marca),
        'cpu_serial'  =>  strtoupper($request->cpu_serial),  
        'cpu_marca'  =>  strtoupper($request->cpu_marca),       
        'conector_internet'  => $request->conector_internet,    
        'conector_corriente_cpu'  => $request->conector_corriente_cpu,    
        'conector_corriente_monitor'  => $request->conector_corriente_monitor,    
        'conector_cpu_monitor'  => $request->conector_cpu_monitor,  
        'correo_electronico'  => $request->correo_electronico,       
        'status'  => $request->status, 
        'tipo_procesador'  =>  strtoupper($request->tipo_procesador), 
        'memoria_ram'  =>  strtoupper($request->memoria_ram),         
        'disco'  =>  strtoupper($request->disco),
        'any_desk'  => $request->any_desk,
        'nombre_equipo'  => $request->nombre_equipo,
        'sistema_oper'  =>  strtoupper($request->sistema_oper),
        'comentario'  => ($request->comentario),
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
     * Display the specified resource.
     */
    public function pdf(string $id)
    {
       
    
        $asig= AsignacionEquipo::getAsignacionId($id);
     
        $data = [
            'title' => 'Equipos Registrados',
            'date' => date('m/d/Y'),
            'asig' => $asig
        ];     

     

       $pdf = Pdf::loadView('servicios/asignacion/asignacion_equipo_pdf', ['data' => $data]);
 
       return $pdf->stream('equipos.pdf');

       
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
