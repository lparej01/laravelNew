<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class CombosCategorias extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    protected $connection = 'sqlite';

    protected $table="combosxcat";

    //protected $guarded = ['catId'];

    /***definicion de la clave primaria cuando no es id */
   // protected $primaryKey = 'catId';

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

    protected $fillable = ['catId','comboId','cantUM','activo','usuario'];

     /**
    * 
    * Buscar un combocategoria  por su comboId 
    * 
    */
    public static function deleteCombId($comboid){

        return DB::connection('sqlite')
        ->table('combosxcat')    
        ->where('comboId',"=", $comboid)
        ->delete();

    }

    
}
