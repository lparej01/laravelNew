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
     */
    public function show(string $movinvId) {
        
       
       
        $movinv = MovInv::getMovInv($movinvId);      
        
        return view('abastecimiento.transacciones.movinventario.show',compact('movinv'));
     }

 
     
   
     /**
     * Remove the specified resource from storage.
     */
   
     public function destroy(string $id)
    {
        //
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
    * Buscar en tabla pedidos
    * por pedidoId
    *
    *
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
          
        // Pedidos en periodo activo
         dd($request->all());


    }



    /**
     * Creacion de un movimiento de Inventario
     * 
     * 
     */
    public function create(Request $reques){

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
