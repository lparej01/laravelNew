<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

/****
 * 
 * Producto por su marca y peso
 * 
 */
class Sku extends Model implements Auditable
{
    /**metodo para auditar los modelos */
    use \OwenIt\Auditing\Auditable;
 
    protected $connection = 'sqlite';

    protected $table="sku";

    protected $guarded = ['sku'];

    public $timestamp = false;  

    const UPDATED_AT = null;

    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "sku";


    
    protected $fillable = ['catId',
                            'marca',
                            'descripcion',
                            'presentacion',
                            'unidadMedida',
                            'empaque',
                            'costoUnitario',
                            'activo',                            
                            'usuario'];


     /**
     * Busquedad de todos los sku productos por la marca especifica
     * 
     */
    public static function getSkuAll()
    {
        $sku =DB::connection('sqlite')->table('sku')
        ->select('sku.sku',
                    'sku.marca',
                    'sku.catId',
                    'sku.descripcion',
                    'sku.presentacion',
                    'sku.unidadMedida',
                    'sku.empaque',
                    'sku.costoUnitario',                    
                    'sku.activo')                  
                    ->where('activo',1)
                    ->orderBy('sku')                  
                    ->get(); 
       
        return $sku;
       
    }
     /**
     * Busquedad de todos los sku productos por la marca especifica
     * 
     */
    public static function getSkuAllDistn()
    {
        $sku =DB::connection('sqlite')->table('sku')
        ->select('sku.sku',
                    'sku.marca',
                    'sku.catId',
                    'sku.descripcion',
                    'sku.presentacion',
                    'sku.unidadMedida',
                    'sku.empaque',
                    'sku.costoUnitario',                    
                    'sku.activo')
                    ->distinct()
                    ->where('activo',1)
                    ->orderBy('marca')                  
                    ->get(); 
       
        return $sku;
       
    }
    

     /**
     * 
     * Busquedad por los que estan activos
     */
    public static function getSkuActivos()
    {
       
       
        return DB::connection('sqlite')->table('sku')
        ->select('sku.sku',
                    'sku.marca',
                    'sku.catId',
                    'sku.descripcion',
                    'sku.presentacion',
                    'sku.unidadMedida',
                    'sku.empaque',
                    'sku.costoUnitario')
        ->where('activo',1)        
        ->orderBy('marca')                      
        ->get(); 
       
    }

     /**
     * Busquedad por id o sku es el identificador
     * 
     */
    public static function getSkuId($sku)
    {
        $skuId = DB::connection('sqlite')->table('sku')
        ->join('categorias', 'sku.catId', '=', 'categorias.catId')        
        ->select('categorias.categoria', 'sku.*')        
        ->where('sku',$sku)->first();        
       
        return $skuId ;
    }

     /**
     * Creando un producto por su marca
     *  
     */
    public static function createSku($request)
    {
        //dd($request['marca']);
        
        $usuario_id= user()->username; 
       
        $skuCreado= Sku::create([
            'marca'  => $request['marca'],
            'catId'  => $request['catId'],
            'descripcion'  => $request['descripcion'],
            'presentacion'  => $request['presentacion'],           
            'unidadMedida'  => $request['unidadMedida'],
            'empaque'  => $request['empaque'],
            'costoUnitario'  => $request['costoUnitario'],
            'activo'  => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
           
        ]);   
        
        
        return $skuCreado;
        
    }

     /**
     * 
     * Actualizando un producto o Sku
     */
    public static function updateSku($request,$sku)
    {
        $usuario_id= user()->username; 
        

        $object = new Sku;            
        $object = Sku::find($sku);  
        $object->marca = $request->marca;
        $object->descripcion =  $request->descripcion;       
        $object->presentacion =   $request->presentacion;      
        $object->unidadMedida =  $request->unidadMedida;           
        $object->empaque =  $request->empaque;      
        $object->costoUnitario =   $request->costoUnitario;   
        $object->usuario =  $usuario_id;      
        $object->timestamp =   time() ;  
        $object->save();

        
        
        
        return $object;
        
    }

    /**
     * 
     * Eliminado un producto o Sku
     */
    public static function deleteSku($sku)
    {
       
              
        return Sku::find($sku)->delete();
        
    }

     /**
     * 
     * Desactivando un producto o sku
     */
    public static function estatusSku($sku,$estatus)
    {
        $usuario_id= user()->username; 

        $skuId = Sku::find($sku);

        if ($skuId->sku > 0) {           

            $object = new Sku;            
            $object = Sku::find($sku);  
            $object->activo = estatus;      
            $object->usuario =  $usuario_id;     
            $object->save();

            return $object;
            
        } 
              
        
        
    }

    public static function getSkuAllExcep($sku){

       return  DB::connection('sqlite')->table('sku') 
            ->join('categorias', 'sku.catId', '=', 'categorias.catId')        
            ->select('categorias.categoria', 'sku.*')             
             ->where('sku', '<>', $sku)
             ->orderBy('sku')
             ->get();

    }


}
