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

     /***definicion de la clave primaria cuando no es id */
     protected $primaryKey = 'comboId';

    protected $fillable = ['descCombo','peso','activo','usuario'];
    
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
