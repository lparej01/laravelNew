<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\Periodo;
use App\Models\SistemaAbastecimiento\Existencia;



/***
 * 
 * 
 */
class PeriodoController extends Controller
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


    
        $array = array("can_query"=> 1, "can_insert"=>  
                    $permiso_status[0]->status, 
                    "can_update"=>$permiso_status[3]->status,
                    "can_delete"=>$permiso_status[1]->status);    
        $actions = serializeJson($array);

        

        return view("abastecimiento.registros.periodos.index",compact( 'actions'));
   }
   public function generar_periodo(Request $request){

        $messages = [           
            'anio.required' => 'Seleccione el año', 
            
        ];

        $request->validate([
            'anio' => ['required']        
        
        
        ], $messages);
       
       $periodoObtenido =  Periodo::getAnio($request->anio);    
      
       
       /**             
        * Obtener año actual
       */
        $fechaactual = date("Y");

      if ($request->anio > 0  && $request->anio <= $fechaactual) {
           return view('abastecimiento.registros.periodos.periodo', compact('periodoObtenido'));
       } else {
        return redirect()->route('periodo.list')
            ->with('warning', 'Debe selecionar un periodo valido o menor');
       }


    
   }
   /**
    * verificar si el periodo ya hasido abierto y cerrado antes
    * verificar si es primera vez que se abre ese periodo
    * si es viejo el periodo solo se abre no se configura
    * si el periodo es primera vez se configura completo
    */
   public function abrirPeriodo($periodo){

    $usuario_id= user()->id; 
    $user = UsersRol::getUserRolId($usuario_id);
    //periodo vigente
    $periodoActivo = Periodo::buscarPeriodoActual();
    //obtener el periodo marcado
    $getPeriodo= Periodo::buscarPeriodo($periodo);
    //obtener roles   
    $rol= Rol::getRolId($user->rol_id);   

     $result = $getPeriodo->periodo - $periodoActivo->periodo;    
    
    if ($rol->nombre =="Administrator") {
             /**
            * Periodo marcado
             */
            if ($result < 1) {                
                     return redirect()->route('periodo.list')
                     ->with('warning', 'Error ese periodo ya fue abierto');

             }
             /**
             * Periodo marcado es mayor al periodo activo
             */
            if ($result >= 1) {
                
                
                 return redirect()->route('periodo.list')
                 ->with('warning', 'Cerrar el Periodo activo para abrir el Otro');

            }
             
            
     } else {
        return redirect()->route('periodo.list')
        ->with('warning', 'Error no tiene permiso para cambiar el periodo activo');
     }
   

   }
   /***
    * Trae el periodo consultado 
    * variable periodo
    * Periodo a cerrar 
    * año/mes
    */
   public function cerrarPeriodo($periodo){
  
    $usuario_id= user()->id; 
    $user = UsersRol::getUserRolId($usuario_id);
    //obtener roles   
    $rol= Rol::getRolId($user->rol_id);

    //$result1 = Periodo::buscarExistenciaSkuPeriodoMes(200093,$periodo);

    //periodo vigente
    $periodoActivo = Periodo::buscarPeriodoActual();

    if ($rol->nombre =="Administrator") {

        if ($periodoActivo->esActual == 1) {
            
            
                    
                    

            /**Nuevo periodo*/
            $periodoActivoNew = Periodo::buscarPeriodoActual();

            /**Busqueda de la existencia del ultimo mes activo***/  
            $existenciaSku =  Periodo::buscarExistenciaSkuPeriodoAll($periodoActivoNew->periodo);
            $usuario_id= user()->id; 
          
            

            /*** Cantidad de sku de un periodo para gerenerare el foreach***/
            $array_num = count($existenciaSku);         

            for ($i = 0; $i < $array_num; ++$i){
           
                if ($existenciaSku[$i]['sku'] > 0) {

                   //////*****Crear el los sku del proximo periodo activo*****///////                
                      DB::table('existencia')->insert([           
                        'sku'  => $existenciaSku[$i]['sku'],
                        'periodo' => $existenciaSku[$i]['periodo'] + 1,
                        'invInicial' =>$existenciaSku[$i]['invFinal'], 
                        'entradas' => 0, 
                        'salidas' => 0,
                        'merma' => 0, 
                        'costoUnitario' => 0,
                        'invFinal' =>$existenciaSku[$i]['invFinal'],
                        'timestamp' => time(),
                        'usuario' => $usuario_id 
                                
                    
                    ]);  
                    
                   
                } 
              
               


            }
                /****Actualiza el periodo y lo cierra****/
               Periodo::where('periodo',$periodo)->update([
                'esCerrado'  => 1,                     
                'esActual'  => 0,                                       
                'timestamp' => time()    
                ]); 
                /*****Abre el nuevo periodo ****/
                Periodo::where('periodo',$periodo + 1)->update([
                   'esCerrado'  => 0,                     
                   'esActual'  => 1,                                      
                   'timestamp' => time()    
                   ]);  


            
                        
        } 

        return redirect()->route('periodo.list')
        ->with('warning', 'Registrando nuevo periodo');
    }else{

        return redirect()->route('periodo.list')
        ->with('warning', 'Error no tiene permiso para cambiar el periodo activo');

    }
   
   
    
   }
}