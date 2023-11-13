<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class MovInv extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    
    protected $table="movinv";
   
    public $timestamps = false;  

    const UPDATED_AT = null;
    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "movinvId";

    protected $guarded = ['movinvId'];

    protected $fillable = ['sku','tipoMovinv','fechaMovinv','cant','pedidoId','referencia','timestamp','usuario'];

     /**
     * Obtener todas el movimiento de inventario
     */
    public static function getMovInvAll()    {
                                    
           $movinv=DB::table('movinv')->orderBy('movinv', 'desc')->get();        
       
        return $movinv ;
    }

     /**
     * obtener un movimiento de inventario por movinvId
     * 
     */
    public static function getMovInv($movinvId){

        
        
        $movinv = DB::table('movinv')->where('movinvId',$movinvId)->first();    
      
       
       
        return $movinv;
    }

    /**
     * obtener un movimiento de inventario por movinvId
     * 
     */
    public static function updateMovInv($movinvId){         
      
       
     
       
    }
    /**
     * 
     * consulta pedido por el sku por el periodo activo
     * 
     */
    public static function movInvxSku($sku){         
      
       
       
       
    }














}
