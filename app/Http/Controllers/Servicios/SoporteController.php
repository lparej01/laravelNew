<?php

namespace App\Http\Controllers\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios\SoporteTecnico\SoporteTecnico;
use App\Models\Servicios\SoporteTecnico\Departamentos;
use App\Models\Servicios\SoporteTecnico\Incidencias;
use App\Exports\SoporteExport;
use Maatwebsite\Excel\Facades\Excel;

class SoporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sopt = SoporteTecnico::getSoporteTecnico();         
      
        $soporte = serializeJson($sopt);    
        
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


        return view('servicios/soportetecnico/index',compact('soporte','actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos= Departamentos::getAllDepartamentos();
        $incidencias =Incidencias::getAllIncidencias();
        
        return view('servicios.soportetecnico.create',compact('departamentos','incidencias'));
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $soporte= SoporteTecnico::getSoporteTecnicoIdShow($id);      
      

        return view('servicios.soportetecnico.show',compact('soporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {      
      
       $soporte= SoporteTecnico::getSoporteTecnicoId($id);  
       $incidencias = explode(",", $soporte->incid_id);
        
       $incidenc = DB::connection('sqlite')->table('incidencias')
       ->whereNotIn('nombre', $incidencias )
       ->get(); 

        ///para los select diferente del paramento id
       $departamentos=Departamentos::getDepartamentosDifId($soporte->depart_id);
       
       $departId=Departamentos::getDepartamentosId($soporte->depart_id);       

       
        return view('servicios.soportetecnico.edit',compact('soporte','departamentos','incidencias','departId','incidenc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
          $messages = [
           
            'usuarios.required'             => 'El nombre de usuario ser requerido',
            'depart_id.required'             => 'El departamento requerido',
            'incid_id.required'             => 'El nombre debe usuario ser requerido'           
            
            
        ];

        $request->validate([
            'usuarios'           => ['required'], 
            'depart_id'           => ['required'], 
            'incid_id'           => ['required']
            
                       
        ], $messages);  

        $usuario = user()->username;      
            
            $object = new SoporteTecnico; 
            $Object = SoporteTecnico::find($id);
            $Object ['usuarios']  =  $request->usuarios; 
            $Object ['depart_id']  =  $request->depart_id;
            $Object ['incid_id']  = implode(",", $request->incid_id);//lo convierte en un array
            $Object ['sopt1']  =   count($request->incid_id);            
            $Object ['status']  =    $request->status;
            $Object ['comentario']  =  $request->comentario;
            $Object ['users']  =   $usuario;             
            $Object ['updated_at']  =  now();
            $Object ->save();

          
            return redirect()->route('soporte.list')->with('success', 'Actualización realizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('servicios.soportetecnico.delete', compact('id'));
    }
    /**
     * 
     * 
     * */
    public function delete_confirm($id)
    {

            $soporte= SoporteTecnico::deleteSoporte($id);

            if ($soporte) {
                return redirect()->route('soporte.list')->with('success', 'Soporte eliminado exitosamente');
            } else {
                return redirect()->route('soporte.list')->with('info', 'Verifique los datos');
            }

           
            

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       
        $messages = [
           
            'usuarios.required' => 'El nombre de usuario ser requerido',
            'depart_id.required'=> 'El departamento es requerido',
            'incid_id.required' => 'El tipo de incidencia es requerida',
            'created_at.required' => 'Coloque la fecha de la incidencia'
            
            
            
        ];
        $request->validate([
            'usuarios' => ['required'], 
            'depart_id' => ['required'], 
            'incid_id' => ['required'],
            'created_at'         => ['required'] 
            
                       
        ], $messages);  
        
        $usuario = user()->username;      

       $soporte= DB::table('soporte')->insert([
            'usuarios'  => $request->usuarios,  
            'depart_id'  => $request->depart_id, 
            'incid_id'  => implode(",", $request->incid_id), //lo convierte en una cadena
            'sopt1' => count($request->incid_id),                
            'comentario'  => $request->comentario,                
            'created_at' => $request->created_at,
            'users' => $usuario,
            'updated_at' => now()
                           
           
        ]);      
  
        return redirect()->route('soporte.list')
            ->with('success', 'El nuevo tipo de Soporte se creo correctamente');

    }
        /***
         * exportar a excel
         * 
         * ****/
        public function export(){
            return Excel::download(new SoporteExport, 'soporte.xlsx');
        }
        /**
         * 
         * 
         * 
        */
        public function reporte($repor){

            
            // totales 
            SoporteTecnico::getCountInc( );

            //por mes
            SoporteTecnico::getCountIncMonth($repor);
            
           // dd(SoporteTecnico::getIncCantidad());

            return view('servicios.soportetecnico.reporte-gestion');
            
        }  

}
