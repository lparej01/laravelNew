<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SistemaAbastecimiento\Sku;
use App\Models\SistemaAbastecimiento\Categorias;
use App\Models\SistemaAbastecimiento\TipoProducto;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;


class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $sku= Sku::getSkuAll();
        $skuaction = serializeJson($sku);         
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
      

        return view("abastecimiento.registros.catalogos.index",compact('skuaction', 'actions','sku'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=Categorias::getAllCategorias();

        $tipo=TipoProducto::getTipoProductoAll();

        
        return view("abastecimiento.registros.catalogos.create", compact('categorias','tipo'));
    }


     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       ///dd($request->all());
       
        $messages = [
           
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
          
          
        ], $messages);
       
       
        $getSku = Sku::createSku($request->all());
       

       if ($getSku) {
        return redirect()->route('catalogos.list')
                ->with('success', 'El Catalogo se creo correctamente');
       } else {
        return redirect()->route('crear.catalogos')
            ->with('danger', 'Error en la creación del Catalogo');
       }

    }

    /**
     * Display the specified resource.
     */
    public function show($sku)
    {
      
       
        $catalogos=Sku::getSkuId($sku);
          

        return view('abastecimiento.registros.catalogos.show', compact('catalogos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
       ////***Busquedad por id sku */
        $catalogos=Sku::getSkuId($id);
       
        /****todas las categorias */
        $categorias=Categorias::getAllCategorias(); 

        /******/
        $tipo=TipoProducto::getTipoProductoAll();

        $exc= Sku::getSkuAllExcep($id);

        
        
        return view("abastecimiento.registros.catalogos.edit",compact('catalogos','categorias','tipo','exc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$sku)
    {
        
        
         $messages = [           
           
            'marca.required' => 'Seleccione la marca o sku es requerido',
            'descripcion.required'=> 'El tipo de descripcion es requerida ',
            'presentacion.required' => 'Tipo de presentación es requerido',
            'unidadMedida.required'  => 'La unidad de medidada es requerido',
            'empaque.required' => 'El tipo de empaque es requerido',
            'costoUnitario.required'=> 'El costo unitario es  es requerido',
        ];

        $request->validate([            
            'marca'           => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'min:3', 'max:30'],
            'descripcion'           => ['required'],
            'presentacion'           => ['required'],
            'unidadMedida'           => ['required'],
            'empaque'           => ['required'],          
            'costoUnitario'           => ['required'],
          
          
        ], $messages); 

       

        $skuUpdate= Sku::updateSku($request,$sku);

       // dd($request->all());

        if ($skuUpdate) {
            return  redirect()->route('catalogos.list')->with('success', 'Actualizado con exito el proveedor'); 
        } else {
            return redirect()->route('catalogos.list')->with('danger', 'Error al actualizar proveedor'); 
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
