<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class Planes extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    protected $connection = 'sqlite';

    protected $table="planes";

    protected $guarded = ['planId'];

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = 'planId';

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

    protected $fillable = ['comboPlanId','comboProdId',
                'tipoPlan','fechaPlan','fechaProd','cantCombosPlan',
                'cantCombosProd','stRequisicion','stProduccion','merma','activo','usuario'];

    
    /**
    * 
    * Buscar todos los planes activos
    * 
    */
    public static function searchPlanesAllProduccion(){
       
       
       $plan =  DB::connection('sqlite')->table('planes')
        ->join('combos','combos.comboId', '=', 'planes.comboPlanId')
        ->select('planes.planId','planes.comboPlanId','planes.tipoPlan','planes.cantCombosPlan','fechaPlan','combos.descCombo')    
        ->where('tipoPlan',"=", 'Produccion')   
        ->where('planes.activo',"=", 1)
        ->where('cantCombosProd',"=", 0)
        ->orderByDesc('fechaPlan')   
        ->get();
        
      
      //  dd($plan);
       
       
        return $plan;
    }
    public static function searchPlanesAllEntrega(){

        $plan =  DB::connection('sqlite')->table('planes')
        ->join('combos','combos.comboId', '=', 'planes.comboPlanId')
        ->select('planes.planId','planes.comboPlanId','planes.tipoPlan','planes.cantCombosPlan','fechaPlan','combos.descCombo')    
        ->where('tipoPlan',"=", 'Entrega')   
        ->where('planes.activo',"=", 1)
        ->where('cantCombosProd',"=", 0)
        ->orderByDesc('fechaPlan')   
        ->get();
        
      
      //  dd($plan);
       
       
        return $plan;


    }
    /**
     * 
     */
    public static function showProduccion($planId){

        $plan=  DB::connection('sqlite')->table('planes') 
        ->join('combosxcat','combosxcat.comboId', '=', 'planes.comboPlanId')
        ->join('categorias','categorias.catId', '=', 'combosxcat.catId')        
        ->select('planes.planId','combosxcat.comboId','categorias.categoria','combosxcat.cantUM as unidades','planes.cantCombosPlan','planes.stRequisicion')    
        ->where('planes.planId',"=", $planId)                
        ->get();  
        
      

        return $plan;


    }
     /**
     * 
     */
    public static function showEntrega($planId){

        $plan=  DB::connection('sqlite')->table('planes') 
        ->join('combosxcat','combosxcat.comboId', '=', 'planes.comboPlanId')
        ->join('categorias','categorias.catId', '=', 'combosxcat.catId')        
        ->select('planes.planId','combosxcat.comboId','categorias.categoria','combosxcat.cantUM as unidades','planes.cantCombosPlan','planes.stRequisicion')    
        ->where('planes.planId',"=", $planId)                
        ->get();  
        
      

        return $plan;


    }
    /**
    * 
    * Buscar un plan y borrar  por su id 
    * 
    */
    public static function deletePlanId($planId){

        return DB::connection('sqlite')
        ->table('planes')    
        ->where('planId',"=", $planId)
        ->delete();

    }
    /**
    * 
    * Buscar un combocategoria  por su comboId 
    * 
    */
    public static function deleteCombId($comboId){

        return DB::connection('sqlite')
        ->table('planes')    
        ->where('comboPlanId',"=", $comboId)
        ->delete();

    }

    /**
    * 
    * Buscar un Plan  por su comboId 
    * 
    */
    public static function searchPlanId($comboId){

        return DB::connection('sqlite')
        ->table('planes')    
        ->where('acivo',"=", 1)
        ->where('comboPlanId',">", 1000000)
        ->get();

    }
    /**
     * Se busca el plan de produccion de ese conbo si existe 
     */
    public static function getPlanid($comboid){

        $plan =  DB::connection('sqlite')
        ->table('planes') 
       // ->select('tipoPlan','cantCombosPlan')   
        ->where('comboPlanId',"=", $comboid)
        ->get();

       

        return $plan;

    }

    /**
     * Se busca el plan de produccion de ese conbo si existe 
     */
    public static function getTipoPlan($comboid,$tipoPlan){

        $plan =  DB::connection('sqlite')
        ->table('planes')         
        ->where('comboPlanId',"=", $comboid)
        ->where('tipoPlan',"=", $tipoPlan)
        ->get();

       

        return $plan;

    }




    /**
    * 
    * Buscar un combo  por su planid 
    * 
    */
    public static function getComboId($planId){

        return DB::connection('sqlite')
        ->table('planes') 
        ->join('combos','combos.comboId', '=', 'planes.comboPlanId') 
        ->select('planes.*','combos.descCombo')     
        ->where('planId',"=", $planId)
        ->first();

    }

    public static function updateRequisicion($request){

        $usuario_id= user()->username; 
        /*
         *se crea el object para actualizar los valores 
         * Esta funcion permite auditar la actualizacion
         */
        
        $object = new Planes;            
        $object = Planes::find($request->plan);  
        $object->stRequisicion = $request->stenviar;        
        $object->usuario =  $usuario_id;      
        $object->timestamp =   time() ;  
        $object->save();        
       
        return $object;


    }

    public static function getData($request){



    }
   
}