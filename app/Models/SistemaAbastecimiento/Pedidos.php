<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Pedidos;
use App\Models\SistemaAbastecimiento\Sku;

class Pedidos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    protected $connection = 'sqlite';
    
    protected $table="pedidos";

    protected $guarded = ['pedidoId'];

    protected $fillable = ['fechaPedido',
                            'provId',
                            'sku',
                            'cant',
                            'costoUnitario',
                            'costoTotal',
                            'flete',
                            'costoTotalFlete',
                            'cantPendiente',
                            'saldoPendiente',
                            'activo',
                            'usuario'];

    public $timestamps = false;  

    const UPDATED_AT = null;
    const CREATED_AT = null;
                        
     /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "pedidoId";

    /**
     * Buscar todos los pedidos que esten activos
     * 
     */
    public static function getAllPedidos(){
       

       $pedidos = DB::connection('sqlite')->table('pedidos')      
      ->join('proveedores', 'pedidos.provId', '=', 'proveedores.provId') 
      ->join('sku', 'pedidos.sku', '=', 'sku.sku')   
      ->select('proveedores.nombre','sku.marca','sku.descripcion','pedidos.*')
      ->orderByDesc('pedidos.pedidoId')      
      ->get();   


        return  $pedidos;

    }

    public static function getProveedores(){       
        
  
          return Proveedores::select('nombre','provId')->get(); 


    }

    public static function getSku(){

      
        return  Sku::select('sku', 'marca','descripcion')->get();        
          


    }
    
    /**
     * Buscar por el id 
     */
    public static function getPedidoId($pedidoId){


        $pedidos= DB::connection('sqlite')->table('pedidos')
        ->join('proveedores', 'pedidos.provId', '=', 'proveedores.provId') 
        ->join('sku', 'pedidos.sku', '=', 'sku.sku')   
        ->select('proveedores.nombre','sku.marca','sku.descripcion','pedidos.*')
        ->where('pedidoId',$pedidoId)->first();        

        return $pedidos;


    }
    /**
     * Crear un pedido
     */
    public static function createPedidos($request){

        $usuario_id= user()->username; 

        $costoTotal= $request->cant + $request->costoUnitario;
        $costoTotalFlete= $request->flete+ $costoTotal;

        $getPedido= Pedidos::create([
            'fechaPedido'  => $request->fechaPedido,
            'provId'  => $request->provId,
            'sku'  => $request->sku,
            'cant'  => $request->cant,
            'costoUnitario'  => $request->costoUnitario,
            'costoTotal'  =>  $costoTotal,
            'flete'  => $request->flete,        
            'costoTotalFlete'  => $costoTotalFlete,           
            'saldoPendiente' =>$costoTotalFlete, 
            'cantPendiente' =>$request->cant,         
            'activo' => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
           
        ]);   
        
        
        return $getPedido;


    }


    public static function actualizarPedido($request){


       

         $usuario_id= user()->username; 

         $object = new Proveedores;            
         $object = Pedidos::find($request->pedidoId);  
         $object->cant = $request->cant;
         $object->flete =  $request->flete;
         $total= $request->costoTotal + $request->flete;
         $object->costoTotalFlete =  $total;         
         $object->usuario =  $usuario_id;      
         $object->timestamp =   time() ;  
         $object->save();        
 
        
         return $object;
        




        
    }
    



}
