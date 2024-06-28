<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SistemaAbastecimiento\Categorias;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;

class CategoriasController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        $categorias= Categorias::getAllCateg();
        $categ = serializeJson($categorias); 

        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        $permisorol=PermisoRol::getPermisoRolId($user->rol_id);

        $permiso_status = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
            ->select('permiso.nombre', 'permiso_rol.*')
            ->where('permiso_rol.rol_id',$user->rol_id)
            ->get();    
        /**Permisos */
        $array = array(
                    "can_query"=> 1, 
                    "can_create"=> $permiso_status[0]->status, 
                    "can_edit"=>$permiso_status[2]->status,
                    "can_show"=>$permiso_status[5]->status,
                    "can_disable"=>$permiso_status[4]->status,
                    "can_delete"=>$permiso_status[1]->status);                     
                    
        $actions = serializeJson($array);     

       

        return view("abastecimiento.registros.categorias.index",compact('categ', 'actions'));
    }
    /**
     * 
    */
    public function edit($catId){

        $categorias= Categorias::getIdCategorias($catId);
        return view('abastecimiento.registros.categorias.edit', compact('categorias'));

    }
    /**
     * 
     * Vista modal 
     */
    public function show(string $catId){

        $categorias= Categorias::getIdCategorias($catId);
        return view('abastecimiento.registros.categorias.show', compact('categorias'));
    }
    /***
     * 
     * Desactivar
     */
    public function disable_confirm($catId){

        $categorias= Categorias::disable_confirm($catId);

        if ($categorias) {
            return  redirect()->route('categorias.list')->with('success', 'Desactivado con exito la categoria'); 
        } else {
            return redirect()->route('categorias.list')->with('danger', 'Error al desactivar la categoria'); 
        }
        


    }

     /***
     * 
     * Vista para desactivar
     */
    public function disable($catId){

        $categorias= Categorias::getIdCategorias($catId);

        return view('abastecimiento.registros.categorias.disable', compact('categorias'));
        


    }
    /**
     * 
     * Formulario para crear categorias
     */
    public function create(){

        return view("abastecimiento.registros.categorias.create");
    }
    /**
     * Funcion para guardar una categoria
     */
    public function store(Request $request){


         $messages = [           
            'categoria.required'  => 'El nombre de la categoria es requerido', 
            'categoria.unique' => 'El nombre ya se encuentra asignado',
            'costoUnitario.required'  => 'El costo unitario es requerido',
            'precio.required'  => 'El precio es requerido',
            'peso.required' => 'El peso es requerido',
        ];

        $request->validate([
            'categoria'           => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'unique:categorias', 'min:3', 'max:50'],
            'costoUnitario'           => ['required', 'min:1', 'max:10'],
            'precio'           => ['required', 'min:1', 'max:10'],
            'peso'           => ['required','min:1', 'max:10'],
          
        ], $messages);
       
       
        $getCategoria = Categorias::createCategorias($request);
       

       if ($getCategoria) {
        return redirect()->route('categorias.list')
                ->with('success', 'La Categoria se creo correctamente');
       } else {
        return redirect()->route('crear.categorias')
            ->with('danger', 'Error en la creación de la categorias');
       }

    }
    /**Actualizar  */
    public function update(Request $request){

        $messages = [
           
            'categoria.required'             => 'El nombre de la categoria es requerido', 
            'costoUnitario.required'             => 'El costo unitario es requerido',
            'precio.required'             => 'El precio es requerido',
            'peso.required'             => 'El peso es requerido',
        ];

        $request->validate([
            'categoria'           => ['required', 'regex:/^[A-Za-z0-9\s]+$/',  'min:3', 'max:50'],
            'costoUnitario'           => ['required', 'min:1', 'max:10'],
            'precio'           => ['required', 'min:1', 'max:10'],
            'peso'           => ['required','min:1', 'max:10'],
          
        ], $messages);
     
        $getCategoria = Categorias::updateCategorias($request);  
     

       if ($getCategoria) {
        return redirect()->route('categorias.list')
                ->with('success', 'La Categoria se actualizo correctamente');
       } else {
        return redirect()->route('categorias.list')
            ->with('danger', 'Error en la creación de la categorias');
       }
        
    }
}
