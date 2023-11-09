<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

/***
 * 
 * 
 * 
 */
class Productos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    
    protected $table="productos";

    protected $guarded = ['comboId'];

    protected $fillable = [
                        'periodo',
                        'invInicial',
                        'entradas',
                        'salidas',
                        'merma',
                        'costoUnitario',
                        'precio',
                        'invFinal',
                        'usuario'];

    /**
     * 
     * 
     * 
     **/    
   public static function getProductosAll(){

    return DB::table('productos')->get(); 

   }

    /**
     * 
     * obtener producto por un periodo determinado
     * 
     **/    
    public static function getProductosPeriodo($periodo){

        return DB::table('productos')->where('periodo',$periodo)->get(); 
    
       }

   /**
     * Obtener un producto por comboId
     * 
     * 
     **/    
   public static function getProductosId($comboId){


     return $producto = DB::table('productos')->where('comboId',$comboId)->first();        

       
   }
   /**
     * 
     * Obtener un producto por periodo y combo
     * 
     **/    
   public static function getProductosPeriodoId($comboId,$periodo){


    return $producto = DB::table('productos')->where('comboId',$comboId)->where('periodo',$periodo)->first();        

   }
   /**
     * Crear un producto nuevo
     * 
     * 
     **/    
   public static function createProducto(Request $request)
   {
       $usuario_id= user()->username; 
      
       $productoCreado= Productos::create([
           'periodo'  => $request->marca,
           'invInicial'  => $request->invInicial,
           'entradas'  => $request->entradas,
           'salidas'  => $request->salidas,           
           'merma'  => $request->merma,          
           'costoUnitario'  => $request->costoUnitario,
           'precio'  => $request->precio,
           'invFinal'  => $request->invFinal,
           'usuario'  => $usuario_id,           
           'timestamp' => time()   
                  
          
       ]);   
       
       
       return  $productoCreado;
       
   }
   /**
     * Actualizando el producto
     * 
     * 
     **/    
   public static function updateProducto(Request $request,$comboId)
   {
       $usuario_id= user()->username; 

       $productoActualizado = Sku::where('comboId',$comboId)->update([

            'periodo'  => $request->marca,
            'invInicial'  => $request->invInicial,
            'entradas'  => $request->entradas,
            'salidas'  => $request->salidas,           
            'merma'  => $request->merma,          
            'costoUnitario'  => $request->costoUnitario,
            'precio'  => $request->precio,
            'invFinal'  => $request->invFinal,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                    
          
       ]);
       
       
       
       return $productoActualizado;
       
   }

    /**
     * 
     * Eliminado un producto
     */
    public static function deleteProducto($comboId)
    {
       
              
        return Productos::find($comboId)->delete();
        
    }


}
