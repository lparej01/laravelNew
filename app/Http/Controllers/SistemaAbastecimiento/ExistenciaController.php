<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SistemaAbastecimiento\Existencia;
use App\Models\SistemaAbastecimiento\Periodo;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;

class ExistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $exist = Existencia::getExistenciaPeriodActivo();
        $existencia = serializeJson($exist);         
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

        return view("abastecimiento.transacciones.existencia.index",compact('existencia', 'actions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
              
        $periodo= Periodo::buscarPeriodoActual();       
        
        $existencia = DB::connection('sqlite')->table('existencia')
                    ->join('sku', 'sku.sku', '=', 'existencia.sku') 
                     ->select('existencia.sku','sku.descripcion','existencia.invInicial')
                     ->where('periodo','=',$periodo->periodo) 
                     ->where('invInicial','=',0) 
                     ->where('invFinal','=',0) 
                     ->orderBy('sku.descripcion', 'asc')
                     ->get();    
                     
        // dd($existencia);            
        
        return view('abastecimiento.transacciones.existencia.create',compact('existencia'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        /**Valido los campos del formulario */
        $messages = [
           
            'sku.required' => 'El nombre del Combo es necesario',
            'invInicial.required' => 'El peso del combo es requerido'            
        ];

        $request->validate([
            'sku'           => ['required'],
            'invInicial'
        ], $messages);

         /**Actualizo los datos */
         $existencia= Existencia::updateExistencia($request->sku, $request->invInicial);
        
         //valida la actualiazacion
         if ($existencia) {
             return redirect()->route('existencia.list')
                     ->with('success', 'La existencia se creo correctamente');
            } else {
             return redirect()->route('create.existencia')
                 ->with('danger', 'Error en la creacion de la existencia del sku');
            }
 



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,string $per) {
        
       $sku = $id;
       $periodo = $per;       
       $existencia = Existencia::getExistenciaSkuPeriodo($sku,$periodo);  

       
       return view('abastecimiento.transacciones.existencia.show',compact('existencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,string $per)
    {
       $sku = $id;
       $periodo = $per;

        $periodoActual=  Periodo::buscarPeriodoActual();

       

        if ($periodoActual->periodo != $periodo) {

            return redirect()->route('existencia.list')
            ->with('success', 'Error el periodo no es el Actual no se puede modificar');
        } else {

            $existencia = Existencia::getExistenciaSkuPeriodo($sku,$periodo);        
            return view('abastecimiento.transacciones.existencia.edit',compact('existencia'));
        }
        
       
      

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       

        $existencia = Existencia::actualizarExistenciaSkuPeriodo($request); 

       

        if ($existencia ==false) {

            return redirect()->route('existencia.list')
            ->with('success', 'Error en los calculos debe revisar la Información ');
            
           } else {
            return redirect()->route('existencia.list')
            ->with('success', 'La Existencia se creo correctamente');
           }

        
        
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
