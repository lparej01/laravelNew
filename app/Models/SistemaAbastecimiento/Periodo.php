<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Productos;
use App\Models\SistemaAbastecimiento\Existencia;
use Arr;
use Collection;


class Periodo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    

    protected $table="periodo";

    protected $guarded = ['periodo'];

    protected $fillable = ['anio','mes','mesNombre','esCerrado','esActual','usuario'];

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "periodo";


     /**
     * Busquedad de todos los periodos 
     * 
     */
    public static function getAllPeriodos()   {
       
       
        return DB::table('periodo')
        ->select('periodo.periodo',
        'periodo.anio',
        'periodo.mes',
        'periodo.mesNombre',       
         DB::raw("(CASE WHEN periodo.esCerrado = 1  THEN 'Cerrado' WHEN periodo.esCerrado=0 THEN 'Abiertos' END) as cerrado"),
         DB::raw("(CASE WHEN periodo.esActual = 1  THEN 'Actual' WHEN periodo.esActual=0 THEN 'Solo Creados' END) as actual"))
         ->get(); 
       
    }

    /**
     * Busquedad de un periodo
     * 
     */
    public static function getPeriodoId($periodo) {
       
       
        return DB::table('periodo')
        ->select('periodo.periodo',
        'periodo.anio',
        'periodo.mes',
        'periodo.mesNombre',       
         DB::raw("(CASE WHEN periodo.esCerrado = 1  THEN 'Cerrado' WHEN periodo.esCerrado=0 THEN 'Abiertos' END) as cerrado"),
         DB::raw("(CASE WHEN periodo.esActual = 1  THEN 'Actual' WHEN periodo.esActual=0 THEN 'Solo Creados' END) as actual"))
         ->where('periodo',$periodo)
         ->get(); 
       
    }
    /**
     * Busquedad de un periodo por anio
     * 
     */
    public static function getAnio($anio) {
       
       
        return DB::table('periodo')
        ->select('periodo.periodo',
        'periodo.anio',
        'periodo.mes',
        'periodo.mesNombre', 
        'periodo.esCerrado',
        'periodo.esActual',
         DB::raw("(CASE WHEN periodo.esCerrado = 1  THEN 'Cerrado' WHEN periodo.esCerrado = 0 THEN 'Abierto' END) as cerrado"),
         DB::raw("(CASE WHEN periodo.esActual = 1  THEN 'Cerrar' WHEN periodo.esActual= 0 THEN 'Abrir' END) as actual"),
         )
         ->where('anio',$anio)
         ->get(); 
       
    }
     /**
     * Borrar un periodo
     * 
     */
    public static function deletePeriodo($periodo){

        
        return Periodo::find($periodo)->delete();
        
        

    }

     /**
     * Actualizar el estado del periodo
     * 
     */
    public static function cambiarEstadoDelPeriodo(Request $request,$periodo){

        
        return  Periodo::where('periodo',$periodo)->update([
                'esCerrado'  => $request->esCerrado,
                'esActual'  => $request->esActual,                  
                'timestamp' => time()   
                    
          
                 ]);
      
    }

    /**
     * Busquedad de un periodo
     * 
     */
    public static function createPeriodoToYear() {
       
       /**
        * Buscar el ultimo periodo
        * periodo se genera automaticamente
        * Generar los doce meses del año por el nuevo periodo 
        * Model::latest()->get();       
        **/
        
        $usuario_id= user()->username; 
        
        $anio = Periodo::last()->anio ;
        $anio= $anio + 1;

        if ($anio !=0) {

            Periodo::create(['anio'=>  $anio,'mes'  => 1,'mesNombre'  =>ENERO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]);   
            Periodo::create(['anio'=>  $anio,'mes'  => 2,'mesNombre'  =>FEBRERO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 3,'mesNombre'  =>MARZO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 4,'mesNombre'  =>ABRIL,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 5,'mesNombre'  =>MAYO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 6,'mesNombre'  =>JUNIO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 7,'mesNombre'  =>JULIO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 8,'mesNombre'  =>AGOSTO,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 9,'mesNombre'  =>SEPTIEMBRE,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 10,'mesNombre'  =>OCTUBRE,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 11,'mesNombre'  =>NOVIEMBRE,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 
            Periodo::create(['anio'=>  $anio,'mes'  => 12,'mesNombre'  =>DICIEMBRE,'esCerrado' => 0,'esActual'  => 0,'usuario'  => $usuario_id,]); 

            return true;
        }else{
            return false;

        } 
       
       
       
    }
    /**
     * 
     * Periodo actual funcionando
     */
    public static function buscarPeriodoActual(){

        return Periodo::where('esActual',1)->first();
    
    }

    /**
     * 
     * Periodo 
     * Buscar un periodo
     */
    public static function buscarPeriodo($periodo){

        return Periodo::where('periodo',$periodo)->first();
    
    }
    /**
     * por un catalogo o sku en particular
     * año y mes del sku
     */
    public static function buscarExistenciaSkuPeriodoMes($sku,$periodoMes){

        return DB::table('existencia')
                        ->select('sku', 'periodo','invInicial','invfinal')
                        ->where('periodo',$periodoMes-1)->where('sku',$sku)->get();


    }

     /**
     *  Serian todos los sku de un mes de un año
     *  Tabla existencia
     * 
     */
    public static function buscarExistenciaSkuPeriodoAll($periodoMes){
        
        $exit = Existencia::select('sku', 'periodo','invInicial','invFinal')
               ->where('periodo',$periodoMes)->orderBy('sku')->get()->toArray(); 
         
       
        
        return  $exit;     



    }




}
