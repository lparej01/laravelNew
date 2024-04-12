<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Pedidos;

class PedidosController extends Controller
{
    public function index(){

        $sku= Pedidos::getAllPedidos();
        $pedidos = serializeJson($sku);         
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
      

        return view("abastecimiento.transacciones.pedidos.index",compact('pedidos', 'actions','sku'));

        
    }
    public function store(Request $request){

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

         $crearPedidos = Pedidos::createPedidos($request);

         

         if ($crearPedidos) {
            return redirect()->route('pedidos.list')
                    ->with('success', 'La Categoria se creo correctamente');
           } else {
            return redirect()->route('crear.pedidos')
                ->with('danger', 'Error en la creación del Pedido');
           }

        
    }

   
    public function update(Request $request){

        $messages = [
           
            'cant.required'             => 'La cantidad es  requerida', 
            'flete.required'             => 'El costo del flete es requerido',
           
        ];

        $request->validate([
            'cant'           => ['required',  'min:1', 'max:50'],
            'flete'           => ['required', 'min:1', 'max:10'],
           
          
        ], $messages);

        $pedidos = Pedidos::actualizarPedido($request); 

        if ($pedidos) {
            return redirect()->route('pedidos.list')
                    ->with('success', 'El pedido se actualizo correctamente');
           } else {
            return redirect()->route('edit.pedidos')
                ->with('danger', 'Error en la edicion del pedido');
           }




        
    }
    /**
     * 
     * 
     */
    public function costtotal(Request $request){

        
        
       if( !isset($request->costo) || $request->costo ==0){

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
    *
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
     * 
     * 
     */
    public function create(){

        $proveedor= Pedidos::getProveedores();
        $sku = Pedidos::getSku();       
        
        return view("abastecimiento.transacciones.pedidos.create",compact('proveedor','sku'));



    }
    public function show(string $pedidoId)
    {
      
        $pedidos= Pedidos::getPedidoId($pedidoId);

  

         return view("abastecimiento.transacciones.pedidos.show", compact('pedidos'));
       
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pedidoId)
    {
        $pedidos= Pedidos::getPedidoId($pedidoId);

     

        return view("abastecimiento.transacciones.pedidos.edit", compact('pedidos'));
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
