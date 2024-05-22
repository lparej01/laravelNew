<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Periodo;

class Existencia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    
    protected $table="existencia";
    
    protected $connection = 'sqlite';
    
    public $timestamps = false;  

    const UPDATED_AT = null;
    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = 'sku';

    protected $guarded = ['sku']; 
    
    protected $fillable = ['periodo','invInicial','entradas','salidas','merma','costoUnitario','invFinal','usuario'];   


   

    /**
     * Obtener todas la existencia de todos los periodos
     */
    public static function getExistenciaAll()
    {
        $existencia=DB::connection('sqlite')->table('existencia') ->orderBy('periodo', 'desc')->get();        
       
        return $existencia ;
    }
    /***
     * Buscar Periodo activo
     * traer la existencia de ese periodo
     * 
     */
    public static function getExistenciaPeriodActivo(){

          $periodo = Periodo::buscarPeriodoActual();
         
          $existencia=DB::connection('sqlite')->table('existencia')
                    ->join('sku', 'sku.sku', '=', 'existencia.sku') 
                    ->select('existencia.*','sku.descripcion')
                    ->where('periodo','=',$periodo->periodo) 
                     ->orderBy('sku.descripcion', 'asc')
                     ->get();        
       
          return $existencia ; 

    }
    public static function getExistenciaGrafic(){

        $periodoActual= Periodo::buscarPeriodoActual();       

        /**SELECT DISTINCT e.sku,e.periodo,e.invInicial,e.entradas,e.salidas,e.merma,e.invFinal,s.marca  
            FROM existencia e ,sku s
            INNER JOIN existencia ON e.sku = s.sku
            WHERE e.periodo = 202403 AND e.entradas > 0 AND e.salidas > 0 AND e.invFinal > 0 and e.invinicial >= 0  ;  ; */


        $existencia = DB::connection('sqlite')
                        ->table('existencia')
                        ->select('existencia.sku','existencia.periodo','existencia.invInicial',
                         'existencia.entradas','existencia.salidas','existencia.invFinal','sku.marca')
                         ->join('sku', 'sku.sku', '=', 'existencia.sku') 
                        ->where('existencia.periodo', $periodoActual->periodo)
                        ->where('existencia.entradas','>',0)   
                        ->where('existencia.salidas','>',0)                        
                        ->where('existencia.invInicial','>=',0)
                        ->orderBy('existencia.sku', 'asc')
                        ->get(); 

        return $existencia;

     }

     /**
     * obtener un existencia por sku y periodo
     * 
     */
    public static function getExistenciaSkuPeriodo($sku,$periodo){

        $existencia = DB::connection('sqlite')->table('existencia')->where('sku',$sku)->where('periodo',$periodo)->first();        
      
       
       
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


        $sumaSalida = $request->salidas + $request->merma;
        $sumaEntradas =$request->invInicial+ $request->entradas;
        $totalInvFinal = $sumaEntradas - $sumaSalida ;

        if ($sumaSalida > $sumaEntradas ) {
            return false;
       }else { 
        
        $usuario= user()->username;      
        $object = new Existencia;  
        $object = Existencia::find($request->sku);      
        $object->merma =  $request->merma; 
        $object->invFinal =   $totalInvFinal; 
        $object->timestamp = time();       
        $object->usuario =  $usuario;            
        $object->save();       
        
        
        return $object;   
       }
    
    }
    public static function updateExistenciaSkuPeriodoRecepcion($cant,$sku,$tipoMovinv){

        /**Busco el sku por exsitencia actual para modificar */
        $existencia = Existencia::buscarSkuPeriodoActual($sku);
        //dd($existencia);
        if ($tipoMovinv =="Recepcion") {

            $usuario= user()->username;      
            $object = new Existencia;  
            $object = Existencia::find($sku); 
            $entradas = $existencia->entradas + $cant;
            $invFinal = $existencia->invFinal +  $cant ;
            $object->entradas =   $entradas;    
            $object->invFinal =   $invFinal; 
            $object->timestamp = time();       
            $object->usuario =  $usuario;            
            $object->save();       
           
        }  
        if ($tipoMovinv =="Despacho") {

            $usuario= user()->username;      
            $object = new Existencia;  
            $object = Existencia::find($sku); 
            $salidas = $existencia->salidas + $cant;
            $invFinal = $existencia->invFinal - $cant ;
            $object->salidas =  $salidas;    
            $object->invFinal =  $invFinal; 
            $object->timestamp = time();       
            $object->usuario =  $usuario;            
            $object->save();     
        }
        
        return $object;   
       
    
    }
    public static function buscarSkuPeriodoActual($sku){
        $periodo = Periodo::buscarPeriodoActual();

        $existencia = DB::connection('sqlite')
             ->table('existencia')
             ->where('sku',$sku)
             ->where('periodo',$periodo->periodo)->first(); 

       return $existencia;
    }


}
