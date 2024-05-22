<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class Categorias extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'sqlite';
    
    protected $table="categorias";

    protected $guarded = ['catId'];


    protected $fillable = ['categoria','costoUnitario','precio','peso','activo','usuario'];

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "catId";

   

    /**
     * 
     * Obtener todos las categorias
     * 
     */
    public static function  getAllCount(){

        $cate= DB::connection('sqlite')->table('categorias')
        ->select('categorias.catId',
                    'categorias.categoria',
                    'categorias.costoUnitario',
                    'categorias.precio',
                    'categorias.peso')                   
                    ->where('activo',1)           
                    ->count(); 
       

        
         return $cate;
    }
    
    /**
     * 
     * Obtener todos las categorias
     * 
     */
    public static function  getAllCategorias(){

        $cat= DB::connection('sqlite')->table('categorias')
        ->select('categorias.catId',
                    'categorias.categoria',
                    'categorias.costoUnitario',
                    'categorias.precio',
                    'categorias.peso',                    
                    DB::raw("(CASE WHEN categorias.activo = 1  THEN 'Activa' WHEN categorias.activo=0 THEN 'Inactiva' END) as estatus"))
                    ->where('activo',1)                    
                    ->orderBy('categoria') 
                    ->get()->unique('categoria'); 
       

        
         return $cat;
    }

    /**
     * 
     * Obtener todos las categorias
     * 
     */
    public static function  getAllCateg(){

        $cat= DB::connection('sqlite')->table('categorias')
        ->select('categorias.catId',
                    'categorias.categoria',
                    'categorias.costoUnitario',
                    'categorias.precio',
                    'categorias.peso',
                    'categorias.activo')
                    ->where('activo',1)                    
                    ->orderBy('categoria') 
                    ->get(); 
       

        
         return $cat;
    }

    /**
     * 
     * obtener categorias por id
     */
    public static function  getIdCategorias($catId){


        $cat = DB::connection('sqlite')->table('categorias')->where('catId',$catId)->first();        
       
        return $cat ;

        
    }
    /**
     * 
     * 
     */
    public static function disable_confirm($catId){

        $usuario_id= user()->username; 


        $object = new Categorias;            
        $object = Categorias::find($catId);       
        $object->activo =0;
        $object->usuario =  $usuario_id;      

        $object->save();

        return $object;

    }

    /***
     * crear una categorias
     * 
     */
    public static function createCategorias($request){

        $usuario_id= user()->username; 
       
        $catCreada = Categorias::create([
            'categoria'  => $request->categoria,
            'costoUnitario'  => $request->costoUnitario,
            'precio'  => $request->precio,
            'peso'  => $request->peso,           
            'activo'  => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
                   
           
        ]);   
        
        return $catCreada;


        
    }
    /**
     * 
     * actualizar una categoria
     */
    public static function updateCategorias($request){


        $usuario_id= user()->username; 
     
        if ($request->id > 0) {

                    

            $object = new Categorias;            
            $object = Categorias::find($request->id);
            $object->categoria =  $request->categoria;
            $object->costoUnitario =  $request->costoUnitario;
            $object->precio =  $request->precio;
            $object->peso =  $request->peso;
            $object->usuario =  $usuario_id;
            $object->timestamp = time();
    
            $object->save();
           
           
        } 

     
        

        return $object;
    }

    /**
     * Eliminar una categorias
     * 
     */
    public static function deleteCategorias(){


              
        return Categorias::find($catId)->delete();      


        
    }
   
    
}
