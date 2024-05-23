<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\Combos;
use App\Models\SistemaAbastecimiento\Categorias;
use Illuminate\Support\Facades\DB;

class CombosController extends Controller
{
    public function index(){

        
        $comb= Combos::getCombAll();
        // dd($comb);
         //convierto en json
          $combos = serializeJson($comb);
          //  dd( $combos);
        
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
       

        return view("abastecimiento.produccion.combos.index",compact('combos','actions'));

        
    }
    /**
     * Funcion que va al formulario para crear un combo nuevo
     * 
     */
    public function create(){  
        
        $categorias = Categorias::getAllCategorias();

        $count = Categorias::getAllCount();

        //dd($count);
        
        return view("abastecimiento.produccion.combos.create",compact('categorias','count'));

    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
      
        return view('abastecimiento.produccion.combos.delete', compact('id'));
    
    
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function confirm_delete(string $id)
    {
      
     
        $deleteCombos = Combos::deleteCombo($id);
   
        if ($deleteCombos) {
           
            return redirect()->route('combos.list')
            ->with('info', 'El combo se elimino correctamente');

        } else {

            return redirect()->route('combos.list')
                    ->with('warning', 'El combo no se pudo eliminar');
        }
    }
     /**
     * Funcion que va al formulario para crear un combo nuevo
     * 
     */
    public function getCatCount(){  
        
        $categorias = Categorias::getAllCategorias();

        //$categ = Categorias::getAllCategorias->count();

       // dd(   $categ);
        
        return view("abastecimiento.produccion.combos.create",compact('categorias'));

    }
    /***
     * Funcion donde se  guarda los datos del combos
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
        $crearCombos = Combos::createCombo($request);

         /**
          *validaciones  del Create
          */

         if ($crearCombos) {
            return redirect()->route('combos.list')
                    ->with('success', 'El combo se creo correctamente');
           } else {
            return redirect()->route('crear.combos')
                ->with('danger', 'Error en la creación del Combo');
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
        $combos = Combos::updateCombo($request);
        
        //valida la actualiazacion
        if ($combos) {
            return redirect()->route('combos.list')
                    ->with('success', 'El combo se actualizo correctamente');
           } else {
            return redirect()->route('edit.combos')
                ->with('danger', 'Error en la edicion del combo');
           }


    }
    /**
     * Edit the form for editing the specified resource.
     * Funcion que dirije los datos para hacer una actualizacion
     * del combo
     */
    public function edit(string $combosId)
    {
        /**datos */
        $combos= Combos::getCombId($combosId);       
        // dd($combos);
       
       
        if ($combos) {
            return view("abastecimiento.produccion.combos.edit", compact('combos'));
        } else {

            return redirect()->route('combos.list')
                    ->with('info', 'El combo  no se puede modificar');
        }
        


        
    }
    /**
     * Show the form for editing the specified resource.
     * Funcion que dirije los datos para hacer una actualizacion
     * del pedido
     */
    public function show(string $combosId)
    {
        /**datos */
        $combos= Combos::getComboCategorias($combosId);     
       
       
        if ($combos) {
            return view("abastecimiento.produccion.combos.show", compact('combos'));
        } else {

            return redirect()->route('combos.list')
                    ->with('info', 'El combo  no se puede modificar');
        }
        


        
    }
    /**
     * Show the form for editing the specified resource.
     * Funcion que dirije los datos para hacer una actualizacion
     * del pedido
     */
    public function assignment(string $combosId)
    {
        /**datos */
        $combos= Combos::getCombId($combosId);       
        // dd($combos);
        $combos1= Combos::getComboCategorias($combosId);    
       
        if ($combos) {
            return view("abastecimiento.produccion.combos.assignment", compact('combos','combos1'));
        } else {

            return redirect()->route('combos.list')
                    ->with('info', 'El combo  no se puede modificar');
        }
        


        
    }
    

}
