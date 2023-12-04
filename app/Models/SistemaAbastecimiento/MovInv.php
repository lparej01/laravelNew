<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Periodo;
use App\Models\SistemaAbastecimiento\Pedidos;
use DateTime;

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

    public static function periodoActivo(){

        $periodo =DB::table('periodo')->where('esActual', 1)->first();  
        
        
        return $periodo;

    }

    public static function buscarSkuPedido($sku){

        $periodo=MovInv::periodoActivo();

            
        /**Obtengo los pedidos en un determinado mes y año */
       $pedidos= DB::table('pedidos')->where('sku', $sku)
                                    ->whereYear('fechaPedido', $periodo->anio)
                                    ->whereMonth('fechaPedido', '>=' , $periodo->mes)
                                    ->get();
      
       return $pedidos;
    }

    public static function buscarPedidosActivos(){

        $periodo= MovInv::periodoActivo();       
            
        /**Obtengo los pedidos en un determinado mes y año */
        $pedidos= DB::table('pedidos')->join('sku', 'pedidos.sku', '=', 'sku.sku')        
                                    ->select('pedidos.*', 'sku.descripcion')  
                                    ->whereYear('fechaPedido', $periodo->anio)
                                    ->whereMonth('fechaPedido', '>=', $periodo->mes)
                                    ->get();
      
        return $pedidos;
    }

    public static function buscarPedidoId($pedidoId){

        $pedidos= DB::table('pedidos')->where('pedidoId',$pedidoId)->first();

         return $pedidos;

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
