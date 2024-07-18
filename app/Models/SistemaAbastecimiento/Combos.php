<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class Combos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'sqlite';
    
    protected $table="combos";

   // protected $guarded = ['comboId'];

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

     /***definicion de la clave primaria cuando no es id */
     protected $primaryKey = 'comboId';

    protected $fillable = ['descCombo','peso','activo','usuario'];
    
    /**
    * 
    * Obtener todos los combos 
    * 
    */
    public static function getCombAllPeriodo(){

        $periodo = Periodo::buscarPeriodoActual();
        $ultimoId = Productos::latest('comboId')->first(); 
       
        $combos = DB::connection('sqlite')->table('combos')       
        ->where('combos.comboId',">",$ultimoId->comboId)
        ->orderByDesc('combos.comboId')  
        ->get();   


        return  $combos;
    } 

    /**
    * 
    * Obtener todos los combos 
    * 
    */
    public static function getCombAll(){

<<<<<<< HEAD
          
       
        $combos = DB::connection('sqlite')->table('combos')       
        ->where('combos.comboId',">",1000000)
=======
        $combos = DB::connection('sqlite')->table('combos')        
        ->where('combos.comboId',">", 1000000)
>>>>>>> bf1b0e5 (Actualizando 20240506)
        ->orderByDesc('combos.comboId')  
        ->get();   


        return  $combos;
    } 
    /**
    * 
    * Obtener todos los combos 
    * 
    */
    public static function getComboCategorias($comboId){

        $comboscat = DB::connection('sqlite')->table('combosxcat')     
        ->join('categorias','categorias.catId', '=', 'combosxcat.catId')
        ->join('combos','combos.comboId', '=', 'combosxcat.comboId')     
        ->select('combosxcat.comboId','combosxcat.catId','categorias.categoria','combosxcat.cantUM as unidades','combos.descCombo','combos.peso')   
        ->where('combosxcat.comboId',"=", $comboId)
        ->orderByDesc('combosxcat.comboId')  
        ->get();   


        return  $comboscat;
    } 
      
    
    /**
    * 
    * Buscar un combo por su id 
    * 
    */
    public static function getCombId($comboid){

        $combo= DB::connection('sqlite')->table('combos')
        ->where('combos.comboId',"=",$comboid)        
        ->first();

        
        
        return $combo; 

    }

    /**
    * 
    * Buscar un combo por su descCombo
    * 
    */
    public static function getCombDesCombo($descCombo){

       // dd($descCombo);

        return DB::connection('sqlite')->table('combos')    
        ->where('combos.descCombo',"=", $descCombo)        
        ->get();   

    }

    /**
    * 
    * Buscar un combo por su descCombo
    * 
    */
    public static function getCombDesCombo($descCombo){

       // dd($descCombo);

        return DB::connection('sqlite')->table('combos')    
        ->where('combos.descCombo',"=", $descCombo)        
        ->get();   

    }
    /**
    * 
    * Crear un combo 
    * 
    */
    public static function createCombo($request){



    }
    /**
    * 
    * Actualizar un combo 
    * 
    */
    public static function updateCombo($request,$id){



    }
    /**
     * tabla combo
     * tabla combosxcat
     * no debe existir ni tabla planes y productos
     * sino no se puede eliminar
     */
    public static function deleteCombo(string $id){

       /* buscar en tabla planes y tabla productos */
        //dd( $id);
        
        return   DB::connection('sqlite')
                    ->table('combos')    
                    ->where('combos.comboId',"=", $id)
                    ->delete();

    }
   
    
}
