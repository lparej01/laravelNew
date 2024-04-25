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






class DespachosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ped= Pedidos::getAllDespachoAlmacen();
        //convierto en jonn
        $despachos = serializeJson($ped);
        
        
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
      

        return view("abastecimiento.transacciones.despachos.index",compact('despachos', 'actions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $sku= Pedidos::getSku();
        return view("abastecimiento.transacciones.despachos.create",compact('sku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        /**Valido los campos del formulario */
        $messages = [
           
            'fechaPedido.required' => 'La fecha es requerida',             
            'sku.required' => 'El Catálogo o Sku  es requerido',
            'cant.required'=> 'La Cantidad es requeridad'
            
        ];

        $request->validate([
            'fechaPedido'           => ['required'],          
            'sku'           => ['required'],
            'cant'           => ['required','min:1', 'max:10']
            
            
          
        ], $messages);
        //dd($request->all());

        
        //envio datos al create para guadar  
        $crearSolicitud = Pedidos::createPedidosDespachos($request);

         /**
          *validaciones  del Create
          */

         if ($crearSolicitud) {
            return redirect()->route('despachos.list')
                    ->with('success', 'La solicitud de despacho se creo correctamente');
           } else {
            return redirect()->route('crear.despachos')
                ->with('danger', 'Error en la creación del Despacho');
           }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $despachos= Pedidos::getPedidoId($id);       

        return view("abastecimiento.transacciones.despachos.show",compact('despachos'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $despachos= Pedidos::getPedidoId($id);

        
        $sku = Pedidos::getSkuId($despachos->sku);
  
        $skudif= Pedidos::getSkuDif($sku->sku);

         //para editar no debe estar en movimiento de inventario 
         $movinv = MovInv::buscarPedidoMovint( $id);

         if ($movinv == null) {

            return view("abastecimiento.transacciones.despachos.edit",compact('despachos','sku','skudif'));

        } else {

            return redirect()->route('despachos.list')
                    ->with('info', 'Esta Solicitud  esta en el inventario no se puede modificar');
        }
        

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         /**Valido los campos del formulario */
         $messages = [
           
            'fechaPedido.required' => 'La fecha es requerida',             
            'sku.required' => 'El Catálogo o Sku  es requerido',
            'cant.required'=> 'La Cantidad es requeridad'
            
        ];

        $request->validate([
            'fechaPedido'   => ['required'],          
            'sku'           => ['required'],
            'cant'          => ['required','min:1', 'max:10']
            
            
          
        ], $messages);
       

        /**Actualizo los datos */
        $despachos = Pedidos::actualizarDespachos($request ,$id);
        
        //valida la actualiazacion
        if ($despachos) {
            return redirect()->route('despachos.list')
                    ->with('success', 'La solicitud de despacho se actualizo correctamente');
           } else {
            return redirect()->route('edit.despachos')
                ->with('danger', 'Error en la edicion del pedido');
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
