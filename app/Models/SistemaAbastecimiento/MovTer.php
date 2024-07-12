<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class MovTer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    protected $connection = 'sqlite';
    
    protected $table="movter";

    protected $guarded = ['movterId'];

    protected $fillable = ['comboId','tipoMovter','fechaMovter','cant','planId','activo','usuario'];

    public $timestamps = false;  

    const UPDATED_AT = null;
    const CREATED_AT = null;

     /***definicion de la clave primaria cuando no es id */
     protected $primaryKey = "movterId";

     public static function getProductosTerminados(){
   
   
        
      
        $movter = DB::connection('sqlite')->table('movter')
        ->orderByDesc('comboId')
        ->where('fechaMovter','>=','2024-01-01')->get(); 
    
       
        
        return $movter;
       }

    /**
     * Obtener un producto por movterid
     * 
     * 
     **/    
   public static function showTer($movterid){

    
     return DB::connection('sqlite')
            ->table('movter')           
            ->where('movterId',$movterid)           
            ->first();       

       
   }

}
