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
   
    protected $connection = 'sqlite';

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
                                    
           $movinv=DB::connection('sqlite')->table('movinv')
                                    ->join('sku', 'movinv.sku', '=', 'sku.sku')        
                                    ->select('movinv.*', 'sku.descripcion')  
                                    ->orderBy('fechaMovinv', 'desc')->get();        
       
        return $movinv ;
    }
    /**
     * Buscando el periodo activo
     * 
     */
    public static function periodoActivo(){

        $periodo =DB::connection('sqlite')->table('periodo')->where('esActual', 1)->first();  
        
        
        return $periodo;

    }
     /***
      * Buscar pedido por sko o catalogo
      */
    public static function buscarSkuPedido($sku){

       $periodo=MovInv::periodoActivo();
            
       /**Obtengo los pedidos en un determinado mes y año */
       $pedidos= DB::connection('sqlite')->table('pedidos')->where('sku', $sku)
                                    ->whereYear('fechaPedido', $periodo->anio)
                                    ->whereMonth('fechaPedido', '>=' , $periodo->mes)
                                    ->get();      
       return $pedidos;
    }
    /***
     * Buscar sku en determinado periodo de mes y año
     * 
     */
    public static function buscarPedidosActivos(){

        $periodo= MovInv::periodoActivo();       
            
        /**Obtengo los pedidos en un determinado mes y año */
        $pedidos= DB::connection('sqlite')->table('pedidos')
                                    ->join('sku', 'pedidos.sku', '=', 'sku.sku')        
                                    ->select('pedidos.*', 'sku.descripcion','sku.marca')
                                    ->where('cantPendiente' ,'>', 0)  
                                    ->whereYear('fechaPedido', $periodo->anio)
                                    ->whereMonth('fechaPedido', '>=', $periodo->mes)
                                    ->orderBy('sku.descripcion', 'asc')                                    
                                    ->get();
      
        return $pedidos;
    }
    /**Buscar pedido por id */
    public static function buscarPedidoId($pedidoId){

        $pedidos= DB::connection('sqlite')->table('pedidos')->where('pedidoId',$pedidoId)->first();

        return $pedidos;

    }

    /**Buscar un  pedido en el movimiento de inventario
     * 
     * 
     */
    public static function buscarPedidoMovint($pedidoId){

        $movinv = DB::connection('sqlite')->table('movinv')->where('pedidoId',$pedidoId)->first();

        return $movinv;

    }

     /**
     * obtener un movimiento de inventario por movinvId
     * 
     */
    public static function getMovInv($movinvId){

        
        
        $movinv = DB::connection('sqlite')->table('movinv')
                    ->join('sku', 'movinv.sku', '=', 'sku.sku')        
                     ->select('movinv.*', 'sku.descripcion')  
                    ->where('movinvId',$movinvId)->first();    
      
     
       
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
