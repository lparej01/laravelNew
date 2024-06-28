<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\MovTer;
use App\Models\SistemaAbastecimiento\Combos;
use Illuminate\Support\Facades\DB;
use Arr;
use App\Models\SistemaAbastecimiento\Planes;
use App\Models\SistemaAbastecimiento\Productos;

class PlanesProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Planes::searchPlanesAllProduccion();
          
        //convierto en json
       $plan = serializeJson($planes);
        
      // dd( $plan);
       $usuario_id= user()->id; 
       //Valido el suario el rol que tiene para mostar los pewrmisos        
       $user = UsersRol::getUserRolId($usuario_id);
       //obtebngo los permisos 
       $permisorol=PermisoRol::getPermisoRolId($user->rol_id);

       $permiso_status = DB::table('permiso_rol')
           ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
           ->select('permiso.nombre', 'permiso_rol.*')
           ->where('permiso_rol.rol_id',$user->rol_id)
           ->get(); 

          

       //genero los permisos del usuario
       $array = array("can_create" => $permiso_status[0]->status, 
                       "can_edit" => $permiso_status[2]->status, 
                       "can_show" => $permiso_status[5]->status,
                       "can_assignment" => $permiso_status[4]->status,
                       "can_delete" => $permiso_status[1]->status);  

        
       //convierto en json
       $actions = serializeJson($array);

      // dd($planes);
       return view("abastecimiento.produccion.planes_produccion.index",compact('plan','actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $planId)
    {
        $planes = Planes::showProduccion($planId);
        $plan= Planes::getComboId($planId);
       
        $co = $plan->comboPlanId;
        $combo= Combos::getCombId($co);

       
        return view("abastecimiento.produccion.planes_produccion.show",compact('planes','combo'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $planid)
    {
        $planid = Planes::getComboId($planid);
             

        if ($planid->planId > 0) {            
           
            return view("abastecimiento.produccion.planes_produccion.edit",compact('planid'));
          

        } else {
            
            return response()->json(
                [
                    'danger' => false
                ]
                );

        }
    }

    /**
     * 
     * Verifico que el combo este creado en la tabla productos
     * Actualizo la tabla de planes 
     * Le doi entrada a productos en el combo selecionado
     */
    public function update(Request $request, string $planid)
    {
       

        /**Obtengo el combo de la tabla planes  */
        $plan = Planes::getComboId($planid);
        /**verifico el combo en la tabla producto  */
        $producto = Productos::getProductosId($plan->comboPlanId);
       
         /* si existe el combo en productos*/
        if (isset($producto->comboId) && $request->cantidadSolicitada <= $plan->cantCombosPlan)  {
            # verificar el invinicial 
            # las entradas salidas e inventario final
            $entradas= $producto->entradas + $request->cantidadSolicitada;
            $salidas= $producto->salidas + $producto->merma; 
            $totalingreso = $entradas - $salidas;

            $usuario_id= user()->username; 
       
            /**actualizo planes */
            $object = new Planes;            
            $object = Planes::find($planid);         
            $object->fechaProd=   date('Y-d-m',time());                 
            $object->cantCombosProd = $request->cantidadSolicitada;      
            $object->stRequisicion =  1;      
            $object->stProduccion =   1;   
            $object->usuario =  $usuario_id;      
            $object->timestamp =   time() ;  
            $object->save();

            /**actualizo productos */
            $object_productos = new Productos;            
            $object_productos = Productos::find($producto->comboId);           
            $object_productos->entradas= $entradas;       
            $object_productos->invFinal=  $totalingreso ;   
            $object_productos->usuario =  $usuario_id;      
            $object_productos->timestamp =   time() ;  
            $object_productos->save();  
            
            /**ingreso en tabla de movter se guarda el detalle de la 
             * transaccion se  de recepcion o entrega  */
            /**Genero Create */
            MovTer::Create([
                'comboId'  => $producto->comboId,
                'tipoMovter'  => 'Recepcion',           
                'fechaMovter' =>  date('Y-d-m',time()),   
                'cant' => $request->cantidadSolicitada,
                'planId' =>$planid,                            
                'activo' => 1,
                'usuario'  => $usuario_id,           
                'timestamp' => date('YdmHis',time())           
    
            ]);  

         
           
            return redirect()->route('planes-produccion.list')
            ->with('success', 'Plan ingresado correctamente');

        } else {
            return redirect()->route('planes-produccion.list')
             ->with('info', 'Debe registar el combo en produccion  o el monto excede lo permitido ');
        }
        



    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $planId)
    {
        return view("abastecimiento.produccion.planes_produccion.delete",compact('planId'));
    }
    /**
     * Remove the specified resource from destroy_confirm.
     */
    public function delete_confirm(string $planId)
    {
       // dd("asdds");      
        
        $plan = Planes::deletePlanId($planId);

         if ($plan) {
            return  redirect()->route('planes-produccion.list')->with('success', 'Elimacion del plan de produccion con exito '); 
        } else {
            return redirect()->route('planes-produccion.list')->with('info', 'Error al eliminar el plan de produccion'); 
        } 
         
    }

    /**
     * Display the specified resource.
     * Modal de vista de pedidos
     */
    public function strequisicion(Request $request) {   
    
       
        $stq = Planes::updateRequisicion($request);    
       
        if(isset($tq)){
            return response()->json(
                [
                    'lista' => $stq,                   
                    'success' => true
                ]
                );
      
        }else
        {
            return response()->json(
                [
                    'danger' => false
                ]
                );

        } 
    }
    public function reporteproduccion(string $planid){

       $planid = Planes::getComboId($planid);
       

        if ($planid->planId > 0) {
            
           
            return view("abastecimiento.produccion.planes_produccion.edit",compact('planid'));
           
        } else {
            
            return response()->json(
                [
                    'danger' => false
                ]
                );

        }
        
        

    }
}
