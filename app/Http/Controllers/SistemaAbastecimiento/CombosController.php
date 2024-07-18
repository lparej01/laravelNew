<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\Combos;
use App\Models\SistemaAbastecimiento\Categorias;
use App\Models\SistemaAbastecimiento\CombosCategorias;
use Illuminate\Support\Facades\DB;
use Arr;
<<<<<<< HEAD
use App\Models\SistemaAbastecimiento\Planes;
use App\Models\SistemaAbastecimiento\Productos;
=======
>>>>>>> bf1b0e5 (Actualizando 20240506)

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
     * Eliminar combo por id 
     */
    public function confirm_delete(string $id)
    {
<<<<<<< HEAD
        
        
        $plan = Planes::searchPlanId($id);

        $prod = Productos::getProductosId($id);

        if ($plan != null ||  $prod != null) {
=======
        CombosCategorias::deleteCombId($id);
       
        $deleteCombos = Combos::deleteCombo($id);
   
        if ($deleteCombos) {
           
>>>>>>> bf1b0e5 (Actualizando 20240506)
            return redirect()->route('combos.list')
            ->with('warning', 'El combo no se pudo eliminar pertenece a un plan o producto');

        } else {

            $sku = CombosCategorias::deleteCombId($id);
       
            $deleteCombos = Combos::deleteCombo($id);   
           
            
            return redirect()->route('combos.list')
            ->with('info', 'El combo se elimino correctamente');
 
           
        }
        
    }
     /**
     * Funcion que va al formulario para crear un combo nuevo
     * 
     */
    public function getCatCount(){  
        
        $categorias = Categorias::getAllCategorias();

        //$categ = Categorias::getAllCategorias->count();      
        
        return view("abastecimiento.produccion.combos.create",compact('categorias'));

    }
    /***
     * Funcion donde se  guarda los datos del combos
     */
    public function store(Request $request){
        
<<<<<<< HEAD
        // dd($request->all());
=======
       // dd($request->all());
>>>>>>> bf1b0e5 (Actualizando 20240506)
        /**Valido los campos del formulario */
        $messages = [
           
            'descCombo.required' => 'El nombre del Combo es necesario',
            'peso.required' => 'El peso del combo es requerido'            
        ];

        $request->validate([
            'descCombo'           => ['required'],
            'peso'           => ['required']                
          
        ], $messages);          
             
        
            $usuario_id= user()->username; 

<<<<<<< HEAD
             /**
             * verifico si el combo ya existe 
             */
             $descombo= DB::connection('sqlite')->table('combos')    
            ->where('descCombo',"=", $request->descCombo)        
            ->first();  

            /**si no existe ejecuto la accion */
            if ($descombo ==null) {
                    $combo = DB::connection('sqlite')->table('combos')
                    ->insertGetId([
                    'descCombo'  => $request->descCombo,
                    'peso'  => $request->peso,           
                    'activo' => 1,
                    'usuario'  => $usuario_id,           
                    'timestamp' => date('YdmHis',time())           
            
                    ]);  

=======
         
           $usuario_id= user()->username;  

             /**
             * verifico si el combo ya existe 
             */
             $descombo= DB::connection('sqlite')->table('combos')    
            ->where('descCombo',"=", $request->descCombo)        
            ->first();  

            /**si no existe ejecuto la accion */
            if ($descombo ==null) {
                    $combo = DB::connection('sqlite')->table('combos')
                    ->insertGetId([
                    'descCombo'  => $request->descCombo,
                    'peso'  => $request->peso,           
                    'activo' => 1,
                    'usuario'  => $usuario_id,           
                    'timestamp' => date('Ydm',time())           
            
                    ]);  

>>>>>>> bf1b0e5 (Actualizando 20240506)
                    /**quito lo valores que no necesito del arreglo */
                    $array = $request->except(['_token','peso','descCombo']);
            
                    $arrayCatId= array_filter( $array, 
                    function ($elemento) {
                        return $elemento > 100000 ;
                    }
                   );
        
                  
                    /***los valores no nulo */
                    $ArrayNotNull = array_filter( $array, 
                        function ($elemento) {
                            return $elemento <> null ;
                        }
                    );
                    /** los valores de calculo**/
                    $arr = array_filter($ArrayNotNull, 
                    function ($elemento) {
                        return $elemento <= 50 ;
                    }
                    );
        
                    
                        /**ejecuto insert dinamico para la tabla combo por categorias */
                        foreach ($arr as $key => $value) {
        
                            if ($value > 0 ) {
        
<<<<<<< HEAD
                                DB::connection('sqlite')->table('combosxcat')
                                ->insertGetId([
=======
                                CombosCategorias::create([
>>>>>>> bf1b0e5 (Actualizando 20240506)
                                    'catId'  => $key,
                                    'comboId'  => $combo, 
                                    'cantUM'  => $value,           
                                    'activo' => 1,
                                    'usuario'  => $usuario_id,           
<<<<<<< HEAD
                                    'timestamp' => date('YdmHis',time())                
=======
                                    'timestamp' => date('Ydm',time())             
>>>>>>> bf1b0e5 (Actualizando 20240506)
                                
                                ]);  
                                
                            } 
                    
                            
                        
                        
                       }  
                   return redirect()->route('combos.list')
                  ->with('success', 'El Combo se creo correctamente');
              
        

            } else {
                return redirect()->route('crear.combos')
                    ->with('info', 'El combo  ya existe');
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
     * Funcion que dirige los datos para hacer una actualizacion
     * del pedido
     */
    public function assignment(string $combosId)
    {
        /**datos */
        $combos= Combos::getCombId($combosId);       
        // dd($combos);
        $combos1= Combos::getComboCategorias($combosId);   
        
        $plan =  Planes::getPlanid($combosId);        
        
       
        if ($combos) {
            return view("abastecimiento.produccion.combos.assignment", compact('combos','combos1','plan'));
        } else {

            return redirect()->route('combos.list')
                    ->with('info', 'El combo  no se puede modificar');
        }
        


        
    }
    /***
     * 
     * Aqui se  guarda el plan 
     * Primero debe ser plan de produccion 
     * Luego el plan de  entrega
     */
    public function assignmentsave(Request $request){

      
        /**Valido los campos del formulario */
        $messages = [
           
            'tipoPlan.required' => 'Debe seleccionar un plan',
            'fechaPlan.required' => 'Debe Selecionar una fecha',  
            'cantCombosPlan.required' => 'Debe indicar la cantidad de unidades'                 
        ];

        $request->validate([
            'tipoPlan'           => ['required'],
            'fechaPlan'           => ['required'],
            'cantCombosPlan'           => ['required']                  
          
        ], $messages);          
             
        $usuario_id= user()->username; 

        $array = $request->except(['_token','peso','descCombo']);
   
                /**
                * Se busca si tiene un plan
                * Que tipo de plan 
                */
        $plan =  Planes::getTipoPlan($request->comboId,$request->tipoPlan);       
       


         /***si el plan  no existe  */
         if (count($plan) <= 0 ){          
            
                
              
                Planes::Create([
                'comboPlanId'  => $array['comboId'],
                'comboProdId'  => 1000000,           
                'tipoPlan' => $array['tipoPlan'],   
                'fechaPlan' => $array['fechaPlan'],
                'fechaProd' => $array['fechaPlan'],
                'cantCombosPlan' => $array['cantCombosPlan'], 
                'cantCombosProd' => 0, 
                'stRequisicion ' =>  0,             
                'stProduccion' => 0,             
                'merma' =>  0, 
                'activo' => 1,
                'usuario'  => $usuario_id,           
                'timestamp' => date('YdmHis',time())           
    
                ]);  

              return redirect()->route('combos.list')->with('success', 'Se registro el plan');

            }else{

                return redirect()->route('combos.list')->with('info', 'Error ya existe el plan');

            }
            
        
                         

      }
    

}
