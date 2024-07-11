<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Pedidos;
use App\Models\SistemaAbastecimiento\MovInv;

class PedidosController extends Controller
{
    public function index(){

        
        $ped= Pedidos::getAllPedidos();
        //convierto en jonn
        $pedidos = serializeJson($ped);
        
        
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
                        "can_disable" => $permiso_status[4]->status,
                        "can_delete" => $permiso_status[1]->status);  

      
      
        //convierto en json
        $actions = serializeJson($array);
      

        return view("abastecimiento.transacciones.pedidos.index",compact('pedidos', 'actions','ped'));

        
    }

    /***
     * Funcion donde se  guarda los datos del pedido
     */
    public function store(Request $request){
        
        //dd($request->all());
        /**Valido los campos del formulario */
        $messages = [
           
            'fechaPedido.required' => 'La fecha es requerida', 
            'provId.required' => 'El proveedor es requerido',
            'sku.required' => 'El Catálogo o Sku  es requerido',
            'cant.required'=> 'La Cantidad es requeridad',
            'costoUnitario.required'=> 'El Costo Unitario es requerido',
            'flete.required'=> 'El flete es requerido',
        ];

        $request->validate([
            'fechaPedido'           => ['required'],
            'provId'           => ['required'],
            'sku'           => ['required'],
            'cant'           => ['required','min:1', 'max:10'],
            'costoUnitario'           => ['required','min:1', 'max:10'],
            'flete'           => ['required','min:1', 'max:10'],
          
        ], $messages);

        //envio datos al create para guadar  
        $crearPedidos = Pedidos::createPedidos($request);

         /**
          *validaciones  del Create
          */

         if ($crearPedidos) {
            return redirect()->route('pedidos.list')
                    ->with('success', 'El pedido se creo correctamente');
           } else {
            return redirect()->route('crear.pedidos')
                ->with('danger', 'Error en la creación del Pedido');
           }

        
    }

   
    public function update(Request $request){
        
        /**Valido los campos del formulario */
        $messages = [
           
            'cant.required'             => 'La cantidad es  requerida', 
            'flete.required'             => 'El costo del flete es requerido',
           
        ];
        $request->validate([
            'cant'           => ['required',  'min:1', 'max:50'],
            'flete'           => ['required', 'min:1', 'max:10'],
           
          
        ], $messages);

       

        /**Actualizo los datos */
        $pedidos = Pedidos::actualizarPedido($request);
        
        //valida la actualiazacion
        if ($pedidos) {
            return redirect()->route('pedidos.list')
                    ->with('success', 'El pedido se actualizo correctamente');
           } else {
            return redirect()->route('edit.pedidos')
                ->with('danger', 'Error en la edicion del pedido');
           }


    }
    /**
     * Funcion para el javascript para calcular el 
     * Costo total del pedido en el formulario
     */
    public function costtotal(Request $request){

                
       if(!isset($request->costo) || $request->costo ==0){

        $costototal =$request->cant;

       }       
       else{

        $costototal = $request->cant * $request->costo;

       }
      
              
        if(isset($costototal) >= 0){

            return response()->json(
                [
                    'lista' => $costototal,                   
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
    * Funcion para el javascript para validar el total flete
    *  total flete del formulario
    */
     public function totalflete(Request $request){      
        
        $totalflete = $request->costototal + $request->flete;      
              
        if(isset($totalflete) >= 0){

            return response()->json(
                [
                    'lista' => $totalflete,                   
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
    * Funcion para el javascript para validar el total flete
    *  total flete del formulario
    */
    public function totaledit(Request $request){      
        
       
      
        $totaledit = $request->cant + $request->flete; 
        
   
        if(isset($totaledit) >= 0){

            return response()->json(
                [
                    'lista' => $totaledit,                   
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
     * Funcion que va al formulario para crear un pedido nuevo
     * 
     */
    public function create(){

        $proveedor= Pedidos::getProveedores();
        $sku = Pedidos::getSku();       
        
        return view("abastecimiento.transacciones.pedidos.create",compact('proveedor','sku'));

    }
    /**
     * Funcion para el modal show para ver el pedido
     * 
     */
    public function show(string $pedidoId)
    {
      
        $pedidos= Pedidos::getPedidoId($pedidoId);

  

         return view("abastecimiento.transacciones.pedidos.show", compact('pedidos'));
       
    }
    
    /**
     * Show the form for editing the specified resource.
     * Funcion que dirije los datos para hacer una actualizacion
     * del pedido
     */
    public function edit(string $pedidoId)
    {
        /**datos */
        $pedidos= Pedidos::getPedidoId($pedidoId);       
      
        /**para el select */
        $provee= Pedidos::getProveedoresDif($pedidos->provId);
        /**para el select */
        $sku = Pedidos::getSkuDif($pedidos->sku);

        //para editar no debe estar en movimiento de inventario 
        $movinv = MovInv::buscarPedidoMovint( $pedidoId);

       
        if ($movinv == null) {
            return view("abastecimiento.transacciones.pedidos.edit", compact('pedidos','provee','sku'));
        } else {

            return redirect()->route('pedidos.list')
                    ->with('info', 'El pedido esta en el inventario no se puede modificar');
        }
        


        
    }
    
    

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     /**
     * Remove the specified resource from destroy_confirm.
     */
    public function destroy_confirm(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from disable_confirm
     */
    public function disable_confirm(string $id){

        
    }

    /**
     * Traes las marcas para generar select en catalogos o sku
     */
    public function getMarcasCategorias(string $id){

       
       
    }
}
