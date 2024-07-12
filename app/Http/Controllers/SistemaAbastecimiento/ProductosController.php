<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\Combos;
use Arr;
use App\Models\SistemaAbastecimiento\Planes;
use App\Models\SistemaAbastecimiento\Productos;
use App\Models\SistemaAbastecimiento\Periodo;

/***
 * 
 * Clase que controla la entrada ya salidas de combos realizados
 */
class ProductosController extends Controller
{
      
    public function index()
    {
         $prod= Productos::getProductosAll();
       
         //convierto en json
          $productos = serializeJson($prod);
         
       
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
       

        return view("abastecimiento.produccion.productos.index",compact('productos','actions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $comboid)
    {
       
        
        $producto= Productos::getProductosId($comboid);       

        if ( $producto->comboId > 0) {            
           
            return view("abastecimiento.produccion.productos.edit",compact('producto'));          

        } else {
            
            return redirect()->route('productos .list')
            ->with('warning', 'Error al editar el producto');

        }
    }

    /**
     * Actualizar los producto combos 
     * 
     */
    public function update(Request $request,string $comboid){

       
        
        /**Valido los campos del formulario */
         $messages = [
           
            'invInicial.required' => 'El Inventario Inicial es  requerida', 
            'merma.required'      => 'La merma es requerida',
            'precio.required'     => 'El precio es requerido',
           
        ];
        $request->validate([
            'invInicial'   => ['required',  'min:1', 'max:50'],
            'merma'        => ['required', 'min:1', 'max:10'],
            'precio'       => ['required', 'min:1', 'max:10'],
           
           
          
        ], $messages);


        /**Actualizo los datos */
        $productos = Productos::updateProducto($request,$comboid);
        
        //valida la actualiazacion
        if ($productos) {
            return redirect()->route('productos.list')
                    ->with('success', 'El producto se actualizo correctamente');
           } else {
            return redirect()->route('productos.list')
                ->with('info', 'Error en la edicion del producto');
           }


    }

    public function show(string $comboId){

      $producto = Productos::getProductoId($comboId);

      return view("abastecimiento.produccion.productos.show",compact('producto'));     

    }
     /**
     * Funcion que va al formulario para dar una entrada al producto
     * 
     */
    public function create(){

        $combos= Combos::getCombAllPeriodo();

        //dd(isset($combos));
        
        return view("abastecimiento.produccion.productos.create",compact('combos'));


        
    }

    public function store(Request $request){
        
       
        /**Valido los campos del formulario */
        $messages = [
           
            'invInicial.required' => 'El valor es requerid0', 
            'precio.required' => 'El precio es requerido'
           
        ];

        $request->validate([
            'invInicial'=> ['required'],
            'precio'    => ['required']
           
        ], $messages);


       
        $producto = Productos::getProductosId($request->comboId);
        /**el ultimo id registrado  */
        $ultimoId = Productos::latest('comboId')->first();        
        //$newcombo = $ultimoId->comboId + 1;

      

       
        if (isset($producto)==false) {

                //envio datos al create para guadar  
                $crearProducto = Productos::createProducto($request);
               
                /**
                 *validaciones  del Create
                */

                if ($crearProducto) {
                return redirect()->route('productos.list')
                        ->with('success', 'El producto se creo correctamente');
                } else {
                return redirect()->route('crear.productos')
                    ->with('info', 'Error en la creación del Producto');
                }

        } else {
             return redirect()->route('crear.productos')
                    ->with('info', 'Error ya existe el Producto');
            }
        
        

       
        
    }
     /**
     * Remove the specified resource from destroy_confirm.
     */
    public function delete(string $comboId)
    {    
       return view('abastecimiento.produccion.productos.delete', compact('comboId'));        
       
    }

    /**
     * Remove the specified resource from destroy_confirm.
     */
    public function delete_confirm(string $comboId)
    {
       // dd("asdds");      
        
         $producto= Productos::deleteProductoPeriodo($comboId);

        if ($producto) {
            return  redirect()->route('productos.list')->with('success', 'Elimacion del producto con exito '); 
        } else {
            return redirect()->route('productos.list')->with('info', 'Error al eliminar el producto '); 
        }
         
    }


    /**
     * Remove the specified resource from disable_confirm
     */
    public function disable_confirm(string $id){

        
    }

    
}
