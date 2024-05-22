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

    protected $guarded = ['id'];

    protected $fillable = [];
    
    /**
    * 
    * Obtener todos los combos 
    * 
    */
    public static function getCombAll(){

        $combos = DB::connection('sqlite')->table('combos')        
        ->where('combos.comboId',"<>", 1000000)
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

        return DB::connection('sqlite')->table('combos')    
        ->where('combos.comboId',"=", $comboid)        
        ->first();   

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
   
    
}
