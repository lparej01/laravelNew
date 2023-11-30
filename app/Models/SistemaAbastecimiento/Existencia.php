<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class Existencia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    
    protected $table="existencia";

   
    public $timestamps = false;  

    const UPDATED_AT = null;
    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "sku";

    protected $guarded = ['sku']; 
    protected $fillable = ['periodo','invInicial','entradas','salidas','merma','costoUnitario','invFinal','usuario'];   


   

    /**
     * Obtener todas la existencia de todos los periodos
     */
    public static function getExistenciaAll()
    {
        $existencia=DB::table('existencia') ->orderBy('periodo', 'desc')->get();        
       
        return $existencia ;
    }

     /**
     * obtener un existencia por sku y periodo
     * 
     */
    public static function getExistenciaSkuPeriodo($sku,$periodo){

        $existencia = DB::table('existencia')->where('sku',$sku)->where('periodo',$periodo)->first();        
      
       
       
        return $existencia;
    }

     /**
     * obtener un existencia por un periodo
     * 
     */
    public static function getExistenciaPeriodo($periodo){

        $existencia = DB::table('existencia')->where('periodo',$periodo)->get();        

        return $existencia->periodo;
    }


    /**
     * Buscar si el periodo en existencia ya existe 
     * Crear una nueva existencia con el nuevo periodo
     * 
     * 
     **/    
   public static function generarExistenciaPeriodo($periodo)
   {
       $usuario_id= user()->username; 

       $obtener = Existencia::getExistenciaPeriodo($periodo);

       $exis = false; 

       if ($obtener == null) {

            /**Periodo anterior*/
            $obtenerPerAnt =  $Existencia::getExistenciaPeriodo($periodo - 1);

           
            if ($obtenerPerAnt > 0) {

                /**Nuevo periodo a implementar */
                $nuevoPeriodo = $obtenerPerAnt + 1;

                /***Insertar nuevo periodo de todos los sku en existencia */
                foreach ($obtenerPerAnt as $newPeriodo) {

                    $existenciaCreada= Existencia::create([
                        'sku'  => $newPeriodo->sku,
                        'periodo'  => $nuevoPeriodo,
                        'invInicial'  => $newPeriodo->invFinal,
                        'entradas'  => 0,
                        'salidas'  => 0,           
                        'merma'  => 0,          
                        'costoUnitario'  => 0,
                        'precio'  => 0,
                        'invFinal'  => $newPeriodo->invFinal,
                        'usuario'  => $usuario_id,           
                        'timestamp' => time()   
                               
                       
                    ]);   

                    
                }

                return $exis = true; 
                
            } else {
                return $exis = false;
            }
            



        
       } else {

            return $exis = false;
       
       }
       

      
      
       
       
      
       
   }

    public static function actualizarExistenciaSkuPeriodo($request){


      

        $usuario= user()->username;      
        $object = new Existencia;  
        $object = Existencia::find($request->sku);      

        $sumaSalida = $request->salidas + $request->merma;
        $sumaEntradas =$request->invInicial+ $request->entradas;
        $totalInvFinal = $sumaEntradas - $sumaSalida ;
        

        

        if ($sumaSalida > $sumaEntradas ) {
             return false;
        } else {           
            
            
           
            $object->invInicial = $request->invInicial;
            $object->entradas =  $request->entradas;       
            $object->salidas =   $request->salidas;      
            $object->merma =  $request->merma;       
            $object->costoUnitario =  $request->costoUnitario; 
            $object->invFinal = $totalInvFinal; 
            $object->timestamp = time();       
            $object->usuario =  $usuario;            
            $object->save();       
            
            
            return $object;
        }
               
        
        




        
    }

}
