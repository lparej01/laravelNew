<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\Combos;
use App\Models\SistemaAbastecimiento\Planes;
use App\Models\SistemaAbastecimiento\Productos;
use App\Models\SistemaAbastecimiento\Periodo;

/***
 * 
 * Tabla que se utiliza para llevar control de los combos 
 * 
 */
class Productos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $connection = 'sqlite';
    
    protected $table="productos";

    protected $guarded = ['comboId'];

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = 'comboId';

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

    protected $fillable = [
                        'comboId',
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
   
   
    $periodo = Periodo::buscarPeriodoActual();    
  
    $productos = DB::connection('sqlite')->table('productos')
    ->orderByDesc('comboId')
    ->where('periodo','=',$periodo->periodo)->get(); 

    //dd($productos);
    
    return $productos;
   }

    /**
     * 
     * obtener producto por un periodo determinado
     * 
     **/    
    public static function getProductosPeriodo($periodo){

        return DB::connection('sqlite')
                ->table('productos')
                ->where('periodo',$periodo)
                ->get(); 
    
       }

   /**
     * Obtener un producto por comboId
     * 
     * 
     **/    
   public static function getProductosId($comboId){

     $periodo = Periodo::buscarPeriodoActual();
     return DB::connection('sqlite')
            ->table('productos')
            ->join('combos','combos.comboId', '=', 'productos.comboId')
            ->select('productos.*','combos.descCombo')
            ->where('productos.comboId',$comboId)
            ->where('productos.periodo',$periodo->periodo)
            ->first();       

       
   }
   /**
     * 
     * Obtener un producto por periodo y combo
     * 
     **/    
   public static function getProductosPeriodoId($comboId,$periodo){


     return DB::table('productos')
                ->where('comboId',$comboId)
                ->where('periodo',$periodo)
                ->first();        

   }

   /**
     * Crear un producto nuevo
     * 
     * 
     **/    
   public static function createProducto($request)
   {
       $usuario_id= user()->username; 
       $periodo = Periodo::buscarPeriodoActual();
      //dd($request);
  
       $productoCreado= Productos::create([
           'comboId'  => $request->comboId,
           'periodo'  => $periodo->periodo,
           'invInicial'  => $request->invInicial,
           'entradas'  => 0,
           'salidas'  => 0,           
           'merma'  => 0,          
           'costoUnitario'  => 0,
           'precio'  => $request->precio,
           'invFinal'  =>  $request->invInicial,
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
   public static function updateProducto($request,$comboId)
   {
       $usuario_id= user()->username; 

      $prod= Productos::getProductosId($comboId);

      $entradas =$request->invInicial + $prod->entradas;
      $salidas= $prod->salidas + $request->merma;
      $invfinal =$entradas-$salidas;

       $productoActualizado = Productos::where('comboId',$comboId)->update([            
            'invInicial'  => $request->invInicial,                   
            'merma'  => $request->merma,          
            'precio'  => $request->precio ,          
            'invFinal'  => $invfinal ,
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
    /**
     * 
     * 
     */
    public static function getProductoId($comboId){
      $periodo = Periodo::buscarPeriodoActual();
     
      return DB::connection('sqlite')
            ->table('productos')          
            ->where('productos.comboId',$comboId)
            ->where('productos.periodo',$periodo->periodo)
            ->first();       


    }
    /**
     * 
     * Obtener todos los productos
     */
    public static function getProductoAll(){    
       
     
      return DB::table('productos')->get(); 


    }
     /**
     * tabla combo
     * tabla combosxcat
     * no debe existir ni tabla planes y productos
     * sino no se puede eliminar
     */
    public static function deleteProductoPeriodo(string $comboId){

      /* buscarel periodo */       
       $periodo = Periodo::buscarPeriodoActual();
       return   DB::connection('sqlite')
                   ->table('productos')    
                   ->where('comboId',"=", $comboId)
                   ->where('productos.periodo',$periodo->periodo)
                   ->delete();

   }
  


}
