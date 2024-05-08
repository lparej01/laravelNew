<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\MovInv;
use App\Models\SistemaAbastecimiento\Sku;
use App\Models\SistemaAbastecimiento\Existencia;
use App\Models\SistemaAbastecimiento\Pedidos;
use App\Models\SistemaAbastecimiento\Periodo;
use Carbon\Carbon;

class MovInvController extends Controller
{
    /**
     * Display a listing of the resource.
     * Lista de movimiento de inventario 
     */
    public function index()
    {
       
        $mov = MovInv::getMovInvAll();
        $movInv = serializeJson($mov);         
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

        return view("abastecimiento.transacciones.movinventario.index",compact('movInv', 'actions'));

    }



     /**
     * Display the specified resource.
     * vista de modal movimiento de inventario
     */
    public function show(string $movinvId) {       
       
        $movinv = MovInv::getMovInv($movinvId);      
       
        
        return view('abastecimiento.transacciones.movinventario.show',compact('movinv'));
     }

    /**
     * Display the specified resource.
     * Modal de vista de pedidos
     */
    public function showPedido(Request $request) {   
    

        $pedido = Pedidos::getPedidosTipo($request->sku,$request->tipo);    
        //dd($pedido);
        if(isset($pedido)){

            return response()->json(
                [
                    'lista' => $pedido,                   
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
      
    /**
     * Display the specified resource.
     * Modal de vista de pedidos
     */   
     public function buscarPedido(Request $request) {   
    

        $pedido = Pedidos::getPedidoId($request->pedido);    

       
       
        if(isset($pedido)){

            return response()->json(
                [
                    'lista' => $pedido,                   
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

 
    
      /***
       * Movimiento por Recepcion se rebeja de la tabla pedidos en la columna cantpendiente el monto asignado
       * el monto no debe ser mayor al de la columna cant Luego en la tabla de 
       * existencia se aumenta por la entrada y se modifica el inv final de ese sku
       * en ese periodo.
       * Cuando se hace un movimiento por despacho se rebaja en la tabla pedido en la columna cantidad pendiente no importa el monto 
       * que tengas previamente en la columna pedido.cant 
       * Se aumenta en existencia la salida del producto en la columna salida y se resta en el inventario final 
       * ojo salida como despacho
       * En mov de inventario debe a ver en existencia del producto para generar un movInventario
       * Para que el producto aparezca en despacho debe tener un saldo positivo 
       * Cuando esta en cero la cantidad pendiente indica el producto ya salio debe estar en proceso de 
       * produccion o de entrega
       * 
       */
      public function store(Request $request){
        // dd($request->all());
         //Modulo de mensages para validacion         
        $messages = [           
            'tipoMovinv.required' => 'Seleccione el tipo de movimiento',
            'selectsku.required' => 'Seleccione el Sku',
            'fechaMovinv.required'=> 'Seleccione la Fecha',
            'cant.required' => 'La cantidad es requeridad'           
        ];
        /**validando los campos */
        $request->validate([
            'tipoMovinv'           => ['required'],
            'selectsku'           => ['required'],
            'fechaMovinv'           => ['required'],
            'cant'           => ['required']
        
        ], $messages); 

        $usuario_id= user()->username; 
            /**TIPO RECEPCION  */
         if ($request->tipoMovinv =="Recepcion") {
            
            /**Cantidad que viene del formulario */
            $cant=$request->cant;
            $sku = $request->sku;
            /**Buscando el pedido verificando */
            $pedido= MovInv::buscarPedidoId($request->ped);
           
            if ($cant < $pedido->cant) {
                
                    $dif = $pedido->cantPendiente -$cant;
                    $object = new Pedidos;            
                    $object = Pedidos::find($request->ped);                        
                    $object->cantPendiente = $dif;           
                    $object->usuario =  $usuario_id;      
                    $object->timestamp =   time() ;  
                    $object->save(); 

                
            }  
            if ($cant == $pedido->cant) {
                    $object = new Pedidos;            
                    $object = Pedidos::find($request->ped);                        
                    $object->cantPendiente = 0;           
                    $object->usuario =  $usuario_id;      
                    $object->timestamp =   time() ;  
                    $object->save(); 
            }

            
          
             
         }

            /**TIPO DESPACHO */
         if ($request->tipoMovinv =="Despacho") {
            /**Cantidad que viene del formulario */
            $cant=$request->cant;
            $sku = $request->sku;
            /**Buscando el pedido verificando */
            $pedido= MovInv::buscarPedidoId($request->ped);

            if ($cant <= $pedido->cant) {
                
                $dif = $pedido->cantPendiente -$cant;
                $object = new Pedidos;            
                $object = Pedidos::find($request->ped);                        
                $object->cantPendiente = $dif;           
                $object->usuario =  $usuario_id;      
                $object->timestamp =   time() ;  
                $object->save(); 

            
            }
            if ($cant > $pedido->cant) {
                //dd("aqui");
                return redirect()->route('obtener_pedidos.movinv')
                ->with('warning', 'Error la cantidad es mayor a la cantidad de despacho');

            
            }    


         }

         /***
             * Actualizar la Existencia por la recepcion de sku
             * sku, periodo y las Columna entrada e Inventario final
             */
            $exist = Existencia::updateExistenciaSkuPeriodoRecepcion($cant,$sku,$request->tipoMovinv);

           
           /** TIPO DEVOLUCION */ 
          if ($request->tipoMovinv =="Devolucion") {
           
         }
           /** TIPO RETORNO */
          if ($request->tipoMovinv =="Retorno") {
           
         } 
        
         /**Movimiento de Inventario */
          $getMovInv= MovInv::create([          
            'sku'  => $sku,
            'tipoMovinv'  => $request->tipoMovinv,           
            'fechaMovinv'  => $request->fechaMovinv,
            'cant'  => $cant,
            'pedidoId'  =>   $request->ped,
            'referencia'  => 'NO_REF',       
            'activo' => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
           
        ]); 
        
                
       //valida la actualiazacion
        if ($getMovInv) {
        return redirect()->route('movinv.list')
                ->with('success', 'El movimiento de Inventario se actualizo correctamente');
       } else {
        return redirect()->route('movinv.show_agregar')
            ->with('danger', 'Error en la edicion del movimiento');
       }
       


    }

    /**
    * 
    * tabla pedidos
    * por pedidoId el pedido del periodo activo
    * Y que tenga cantides pendiente 
    * Boton editar movimiento
    */
    public function edit(String $pedidoId){       
          

        $movinv = MovInv::buscarPedidoId($pedidoId);
      
          
        return view('abastecimiento.transacciones.movinventario.edit',compact('movinv'));

    }

    /*****
     * Se revisa el pedido si hay movimiento ,si se agrego al movinv
     * se revisa si ya existe en movinventario
     * Luego se agrega a la existencia
     * table pedidos 
     * table movinventario
     * table existencia  
     */
    public function update(Request $request){       
              

        $messages = [
           
            'tipoMovinv.required' => 'El tipo de movimiento es requerido',
            'cant.required' => 'La Cantidad no puede estar vacia ',
            
        ];

        $request->validate([
            'tipoMovinv'           => ['required'],
            'cant'           => ['required'],
                     
          
        ], $messages); 

        //Obtengo el pedido y la cantididad de ese pedido
        $getPedido =  Pedidos::find($request->pedidoId);
        $getPedido->cant;      
       

         $cantidadPendiente =$request->cantPendiente;
         $cantidad =$request->cant;
         $usuario_id= user()->username; 

     
       
         
           if ($request->tipoMovinv =="Recepcion") {

                        
                        $timestamp = Carbon::now()->timestamp;

                    if ($cantidad <= $cantidadPendiente ) {

                       
                        # genero un registro en el movimiento de inventario
                        # se modifica la cantidad pendiente. se rebaja del pedido campo cantPendiente
                        # Actualizo la tabla de existencia al sku correspondiente en el periodo correspondiente
                        # el campo de entrada y el inventario final
                        #tabla pedidos
                        #tabla movinv
                        #tabla existencia

                        //tabla de movimiento de inventario
                         $movInv = MovInv::create([
                            'sku'  => $request->sku,
                            'tipoMovinv'  => $request->tipoMovinv,
                            'fechaMovinv' => date('Y-m-d'), // 2016-10-12,
                            'cant'  => $request->cant,
                            'pedidoId'  => $request->pedidoId,              
                            'usuario'  => $usuario_id                        
                                   
                           
                        ]);    

                        //tabla de pedidos
                        $object = new Pedidos;            
                        $object = Pedidos::find($request->pedidoId);

                       

                        //cantidad pendiente de la tabla pedidos
                        $pendiente = $object->cantPendiente;
                        // se le resta la cantidad asignada en movimiento de inventario
                        $result=  $request->cant-$pendiente;

                        $object->sku = $request->sku;
                        $object->cantPendiente =  $result;  
                         
                        $object->usuario =  $usuario_id;      
                        $object->timestamp =  $timestamp ;                       
                        $object->save();

                        //dd($object);

                        # Buscar la existencia por el periodo activo y el sku
                        $periodActual = Periodo::buscarPeriodoActual()->periodo;
                        $existencia = Existencia::getExistenciaSkuPeriodo($request->sku,$periodActual);
                        $entradas= $existencia->entradas +  $request->cant;
                        $invFinal = $existencia->invFinal + $request->cant ;


                        DB::connection('sqlite')->table('existencia')->where('sku', $request->sku)->where('periodo',$periodActual)
                        ->update(
                        ['entradas' => $entradas,
                        'invFinal' => $invFinal,
                        'timestamp' => $timestamp ,
                        'usuario' => $usuario_id]);                     
                        
                        return redirect()->route('obtener_pedidos.movinv')
                            ->with('success', 'Agregado el pedido al movimiento de existencia');

                    }
                    if ($cantidad >= $getPedido->cant) {
                        return redirect()->route('obtener_pedidos.movinv')
                        ->with('info', 'Error no puede ser mayor a la cantidad registrada del Pedido Vigente');
                    }
                    
                    

                   // Pedidos en periodo activo en movimiento de inventario
                  // $buscarPedido = MovInv::buscarPedidoMovint($request->pedidoId);

            
           } 
           if ($request->tipoMovinv =="Despacho") {

                    
                #todos lo que son despacho se guarda en pedidos con el proveedor =300000 eso para diferenciar 

                # buscar en existencia por sku y por el periodo activo ver si tiene disponible
                # buscar en movimiento de inventario si este pedido existe por despacho
                # tiene que existir una solicitud de despacho previamente registrado para el Sku seleccionado
                # se genera un movimiento de inventario por despacho
                # esto genera una salida en la tabla de existencia modificando el campo salida y el inventario final
                # de esa tabla

                $periodo=date('Ym',$request->periodo);

                $buscarExistPeriodo = Existencia::getExistenciaSkuPeriodo($request->sku,$periodo-1);



               

               


              /*   return redirect()->route('obtener_pedidos.movinv')
                ->with('info', 'Registro de solicitud de despacho'); */


            
           }


           

            //dd($buscarPedido);


    }

    /**
     * Lista del pedido activo
     * Para generar un movimiento de inventario 
     * Por recepcion, despacho, devolucion , devolucion y retorno
     */
    public function agregarMovInv(){
       
        $movsku= Sku::getSkuActivos();

        return view('abastecimiento.transacciones.movinventario.create_pedidos',compact('movsku')); 



    }
 
}
