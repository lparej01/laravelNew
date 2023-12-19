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
     * vista de modal moviento de inventario
     */
    public function show(string $movinvId) {       
       
        $movinv = MovInv::getMovInv($movinvId);      
       
        
        return view('abastecimiento.transacciones.movinventario.show',compact('movinv'));
     }

    /**
     * Display the specified resource.
     * Modal de vista de pedidos
     */
    public function showPedido(string $pedidoId) {       
       
        $movinv = $movinv = MovInv::buscarPedidoId($pedidoId);      
        
        return view('abastecimiento.transacciones.movinventario.show_pedido_activo',compact('movinv'));
     }

 
    public function store(Request $request){

       /*  $messages = [
           
            'catId.required' => 'El nombre de la categoria requerida',
            'marca.required' => 'Seleccione la marca o sku es requerido',
            'descripcion.required'=> 'El tipo de descripcion es requerida ',
            'presentacion.required' => 'Tipo de presentación es requerido',
            'unidadMedida.required'  => 'La unidad de medidada es requerido',
            'empaque.required' => 'El tipo de empaque es requerido',
            'costoUnitario.required'=> 'El costo unitario es  es requerido',
        ];

        $request->validate([
            'catId'           => ['required'],
            'marca'           => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'min:3', 'max:30'],
            'descripcion'           => ['required'],
            'presentacion'           => ['required'],
            'unidadMedida'           => ['required'],
            'empaque'           => ['required'],          
            'costoUnitario'           => ['required'],
          
          
        ], $messages); */


      //  dd($request->sku);


       // $sku= MovInv::buscarSkuPedido($request->sku); 



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
       
        

         $cantidadPendiente =$request->cantPendiente;
         $cantidad =$request->cant;
         $usuario_id= user()->username; 

        
        // dd($existencia);

        //dd($request->tipoMovinv);
        
         
           if ($request->tipoMovinv =="Recepcion") {

                        
                        $timestamp = Carbon::now()->timestamp;

                    if ($cantidad <= $cantidadPendiente ) {

                       
                        # genero un registro en el movimiento de inventario
                        # se modifica la cantidad pendiente se rebaja del pedido campo cantPendiente
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

                    }else
                        {

                          return redirect()->route('obtener_pedidos.movinv')
                            ->with('success', 'Error el monto debe ser menor o igual que Cantidad Pendiente');
                        }

                   // Pedidos en periodo activo en movimiento de inventario
                  // $buscarPedido = MovInv::buscarPedidoMovint($request->pedidoId);

            
           } 
           if ($request->tipoMovin =="Despacho") {


                # tiene que existir una solicitud de despacho previamente registrado para el Sku seleccionado
                # se genera un movimiento de inventario por despacho
                # esto genera una salida en la tabla de existencia modificando el campo salida y el inventario final
                # de esa tabla
            
           }



           

            //dd($buscarPedido);


    }



    /**
     * Lista del pedido activo
     * Para generar un movimiento de inventario 
     * Por recepcion, despacho, devolucion , devolucion y retorno
     */
    public function listpedidoactivo(Request $request){
       
              
        $mov = MovInv::buscarPedidosActivos(); 
       
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
        
      

        return view('abastecimiento.transacciones.movinventario.create',compact('movInv','actions'));


    }
 
}
