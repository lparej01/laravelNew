<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;

class TipoProducto extends Model
{
    use \OwenIt\Auditing\Auditable;
    
    protected $connection = 'sqlite';
    
    protected $table="tipo_producto";

    protected $guarded = ['id'];

    //public $timestamps = false;  

   // const UPDATED_AT = null;

   // const CREATED_AT = null;

    protected $fillable = ['tipo'];

     /**
     * Obtener todos los proveedores
     */
    public static function getTipoProductoAll()
    {
        $tipo= DB::table('tipo_producto')->orderBy('tipo')->get();        
       
        return $tipo ;
    }

    /**
     * obtener un proveedor por Id
     * 
     */
    public static function getTipoProductoId($id){

        $tipo=DB::table('tipo_producto')->where('id',$id)->first();        

        return $tipo;
    }

    
}
