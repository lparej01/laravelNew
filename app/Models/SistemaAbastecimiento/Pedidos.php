<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\Periodo;
use App\Models\SistemaAbastecimiento\Sku;
use App\Models\SistemaAbastecimiento\Existencia;

class Pedidos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $connection = 'sqlite';  


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
                ->where('proveedores.provId',"<>", 300000)
                ->orderByDesc('pedidos.pedidoId')      
                ->get();   


        return  $pedidos;

    }
    /**
     * Sumas los pedidos de un periodo activos
     * 
     */
    public static function getPedidosPeriodoActivo(){
         
        //Periodo actual
        $periodoActual= Periodo::buscarPeriodoActual();
       

        $ano= substr($periodoActual['timestamp'], 0, 4);
        $mes= substr($periodoActual['timestamp'], 4,-8);
        $dia = substr($periodoActual['timestamp'], 6,-6); 

        $fecha= $ano.'-'.$mes.'-'.$dia;         
      
        $pedidos = DB::connection('sqlite')->table('pedidos')                       
        ->where('pedidos.fechaPedido',">=",  $fecha) 
        ->where('pedidos.provId',">",  300000)   
        ->count('pedidoId');      
       
        
    
        return $pedidos.' solicitudes' ;
    }
     /**
     * Sumas los despachos de un periodo activos
     * 
     */
    public static function getDespachosPeriodoActivo(){
         
        //Periodo actual
        $periodoActual= Periodo::buscarPeriodoActual();  
       

        /* $despachos = DB::connection('sqlite')->table('existencia')                       
        ->where('existencia.periodo',"=", $periodoActual->periodo)        
        ->sum('salidas'); */

        $ano= substr($periodoActual['timestamp'], 0, 4);
        $mes= substr($periodoActual['timestamp'], 4,-8);
        $dia = substr($periodoActual['timestamp'], 6,-6); 

        $fecha= $ano.'-'.$mes.'-'.$dia; 

        $despachos = DB::connection('sqlite')->table('pedidos')                       
        ->where('pedidos.fechaPedido',">=",  $fecha) 
        ->where('pedidos.provId',"=",  300000)   
        ->count('pedidoId')  ;  
     
        
        
        //return number_format($despachos,0, ",", ".");

        return $despachos.' despachos';
    }
    /**
     * Por periodo activo 
     * Pedidos
     * 
     */
    public  static function obtenerPerPed(){

        $periodoActual= Periodo::buscarPeriodoActual();

        if ( $periodoActual->mes <= 9) {
            $mes='0'.$periodoActual->mes;

        } else {
             $mes = $periodoActual->mes;
        }
        
        
        $fecha = $periodoActual->anio.'-'.$mes.'-01';

        /***SELECT DISTINCT pedidoId, fechaPedido, cant
        FROM pedidos
        INNER JOIN existencia ON existencia.sku  = pedidos.sku
        where fechaPedido >= '2024-03-01' and provId !=300000 ORDER by fechaPedido ASC ; 
        
       */
        $ped = DB::connection('sqlite')->table('pedidos')               
         ->join('existencia', 'existencia.sku', '=', 'pedidos.sku')   
         ->select('pedidos.pedidoId','pedidos.fechaPedido','pedidos.cant')
         ->where('pedidos.fechaPedido',">=",  $fecha)
         ->where('pedidos.provId',"!=", 300000) 
         ->groupBy('pedidos.fechaPedido')          
         ->orderBy('pedidos.fechaPedido', 'asc')     
         ->distinct();  
        
        $plucked = $ped ->pluck('pedidos.fechaPedido');
        
        return $plucked;


    }
    /**
     * Por periodo activo 
     * Despachos
     * 
     */
    public  static function obtenerPerDesp(){

        $periodoActual= Periodo::buscarPeriodoActual();

        if ( $periodoActual->mes <= 9) {
            $mes='0'.$periodoActual->mes;

        } else {
             $mes = $periodoActual->mes;
        }
        
        
        $fecha = $periodoActual->anio.'-'.$mes.'-01';

        /***SELECT DISTINCT pedidoId, fechaPedido, cant
        FROM pedidos
        INNER JOIN existencia ON existencia.sku  = pedidos.sku
        where fechaPedido >= '2024-03-01' and provId !=300000 ORDER by fechaPedido ASC ; 
        
       */
        $ped = DB::connection('sqlite')->table('pedidos')               
         ->join('existencia', 'existencia.sku', '=', 'pedidos.sku')   
         ->select('pedidos.pedidoId','pedidos.fechaPedido','pedidos.cant')
         ->where('pedidos.fechaPedido',">=",  $fecha)
         ->where('pedidos.provId',"=", 300000) 
         ->groupBy('pedidos.fechaPedido')    
         ->orderBy('pedidos.fechaPedido', 'asc')     
         ->distinct();  
        
        $plucked = $ped ->pluck('fechaPedido');
        
        return $plucked;

    }
    /**
     * Por periodo activo 
     * Pedidos
     * 
     */
    public  static function obtenerPerPedCant(){

        $periodoActual= Periodo::buscarPeriodoActual();

        

        if ( $periodoActual->mes <= 9) {
            $mes='0'.$periodoActual->mes;

        } else {
             $mes = $periodoActual->mes;
        }
        
        $fecha = $periodoActual->anio.'-'.$mes.'-01';

        /***SELECT DISTINCT pedidoId, fechaPedido, cant
        FROM pedidos
        INNER JOIN existencia ON existencia.sku  = pedidos.sku
        where fechaPedido >= '2024-03-01' and provId !=300000 ORDER by fechaPedido ASC ; 
        
       */
        $ped = DB::connection('sqlite')->table('pedidos')               
         ->join('existencia', 'existencia.sku', '=', 'pedidos.sku')   
         ->select('pedidos.pedidoId','pedidos.fechaPedido','pedidos.cant')
         ->where('pedidos.fechaPedido',">=",  $fecha)
         ->where('pedidos.provId',"!=", 300000)
         ->groupBy('pedidos.fechaPedido')
         ->orderBy('pedidos.fechaPedido', 'asc')        
         ->distinct();  
         
        $plucked = $ped ->pluck('cant');
 
        return $plucked;

    }
    /**
     * Por periodo activo 
     * Pedidos
     * 
     */
    public  static function obtenerPerDespCant(){

        $periodoActual= Periodo::buscarPeriodoActual();

        if ( $periodoActual->mes <= 9) {
            $mes='0'.$periodoActual->mes;

        } else {
             $mes = $periodoActual->mes;
        }
        
        $fecha = $periodoActual->anio.'-'.$mes.'-01';

        /***SELECT DISTINCT pedidoId, fechaPedido, cant
        FROM pedidos
        INNER JOIN existencia ON existencia.sku  = pedidos.sku
        where fechaPedido >= '2024-03-01' and provId !=300000 ORDER by fechaPedido ASC ; 
        
       */
        $ped = DB::connection('sqlite')->table('pedidos')               
         ->join('existencia', 'existencia.sku', '=', 'pedidos.sku')   
         ->select('pedidos.pedidoId','pedidos.fechaPedido','pedidos.cant')
         ->where('pedidos.fechaPedido',">=",  $fecha)
         ->where('pedidos.provId',"=", 300000)
         ->groupBy('pedidos.fechaPedido')
         ->orderBy('pedidos.fechaPedido', 'asc')        
         ->distinct();  
         
        $plucked = $ped ->pluck('cant');
 
        return $plucked;

    }


    /**
     * Buscar todos los pedidos que esten en almacen
     * Almacenn es el campos que se relaciona con despacho es el vinculo que lo identifica
     * 
     */
    public static function getAllDespachoAlmacen(){
       

        $pedidos = DB::connection('sqlite')->table('pedidos')      
                 ->join('proveedores', 'pedidos.provId', '=', 'proveedores.provId') 
                 ->join('sku', 'pedidos.sku', '=', 'sku.sku')   
                 ->select('proveedores.nombre','sku.marca','sku.descripcion','pedidos.*')
                 ->where('proveedores.provId',"=", 300000)
                 ->orderByDesc('pedidos.pedidoId')      
                 ->get();   
 
 
         return  $pedidos;
 
     }   

     /**
      * buscar proveedores sin el de Almacen
      */
    public static function getProveedores(){      
          
        $almacen=300000;  
        return Proveedores::select('nombre','provId')
                    ->where('provId','!=',$almacen)
                    ->orderBy('proveedores.nombre', 'asc')->get(); 


    }
    /***
     * Buscar un proveedor por su id
     */
    public static function getProveedoresId($id){         
          
        
        return Proveedores::select('nombre','provId')                    
                    ->where('provId','=',$id)
                    ->first(); 

        
    }
    /***
     * Buscar proveedores diferentes de ?
     */
    public static function getProveedoresDif($id){       
          
        $almacen=300000;  
        
        return DB::connection('sqlite')->table('proveedores')
                    ->select('provId','nombre',)
                    ->where('provId','!=',$almacen)
                    ->where('provId','!=',$id)
                   ->orderBy('proveedores.nombre', 'asc')->get(); 

           
    }

    /**
     * 
     * Buscar todos los sku */
    public static function getSku(){
        $sku=200000;
        return  Sku::select('sku', 'marca','descripcion')
                ->where('sku','!=',$sku)
                ->orderBy('sku.descripcion', 'asc')->get();        
          


    }
    /***
     * buscar sku por su id
     */
    public static function getSkuId($id){

       
        return  Sku::select('sku', 'marca','descripcion')
                        ->where('sku','=',$id)                       
                        ->first();        
          


    }
    /**
     * Buscar sku activos 
     */
    public static function getSkuDif($id){

        $sku=200000;
        return  DB::connection('sqlite')->table('sku')
                        ->select('sku','descripcion')
                        ->where('sku.activo','<>',0)
                        ->where('sku.sku','<>',$id)
                        ->orderBy('sku.descripcion', 'asc')                            
                       ->get();        
          


    }

    
    /**
     * Buscar pedido  por el id 
     */
    public static function getPedidoId($pedidoId){

        $pedidos= DB::connection('sqlite')->table('pedidos')
        ->join('proveedores', 'pedidos.provId', '=', 'proveedores.provId') 
        ->join('sku','pedidos.sku', '=', 'sku.sku')   
        ->select('proveedores.nombre','sku.marca','sku.descripcion','pedidos.*')
        ->where('pedidoId',$pedidoId)->first();       
       
        return $pedidos;


    }
    
    /**
     * Crear un pedido
     * Costo total es igual cantidad por costo unitario
     * Costotalflete  es igual a costotal mas flete
     * cantPendiente es igual cantidad
     * Saldo pendiente es igual costototalflete
     */
    public static function createPedidos($request){

        //buscar usuario logeado
        $usuario_id= user()->username;

        $getPedido= Pedidos::create([
            'fechaPedido'  => $request->fechaPedido,
            'provId'  => $request->provId,
            'sku'  => $request->sku,
            'cant'  => $request->cant,
            'costoUnitario'  => $request->costoUnitario,
            'costoTotal'  =>   $request->costoTotal,
            'flete'  => $request->flete,        
            'costoTotalFlete'  =>$request->costoTotalFlete,           
            'saldoPendiente' =>$request->costoTotalFlete, 
            'cantPendiente' =>$request->costoTotal,         
            'activo' => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
           
        ]);   
        
        
        return $getPedido;


    }
     /**
     * Crear una solicitud de Despacho
     */
    public static function createPedidosDespachos($request){

        //Buscar usuario logeado
        $usuario_id= user()->username;  

        $getPedidoDespacho= Pedidos::create([
            'fechaPedido'  => $request->fechaPedido,
            'provId'  => 300000,
            'sku'  => $request->sku,
            'cant'  => $request->cant,
            'costoUnitario'  =>0,
            'costoTotal'  =>   0,
            'flete'  => 0,        
            'costoTotalFlete'  =>0,           
            'saldoPendiente' =>0, 
            'cantPendiente' =>$request->cant,         
            'activo' => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
           
        ]);   
        
        
        return $getPedidoDespacho;


    }
    /**
     * Actualizar pedido 
     */
    public static function actualizarPedido($request){


       

         $usuario_id= user()->username; 
         /*
          *se crea el object para actualizar los valores 
          * Esta funcion permite auditar la actualizacion
          */
         $object = new Pedidos;            
         $object = Pedidos::find($request->pedidoId);  
         $object->cant = $request->cant;
         $object->flete =  $request->flete;
         $object->costoTotal= $request->costoTotal;
         $object->costoTotalFlete = $request->costoTotalFlete;
         $object->saldoPendiente = $request->costoTotalFlete;  
         $object->cantPendiente = 0;           
         $object->usuario =  $usuario_id;      
         $object->timestamp =   time() ;  
         $object->save(); 

         
        
         return $object;
        
        
    }
    /***
     * Actualizar solicitud de despacho
     * 
     */
    public static function actualizarDespachos($request,$id){


       

        $usuario_id= user()->username; 
        /*
         *se crea el object para actualizar los valores 
         * Esta funcion permite auditar la actualizacion
         */
        $object = new Pedidos;            
        $object = Pedidos::find($id);  
        $object->cant = $request->cant;       
        $object->cantPendiente = $request->cant;           
        $object->usuario =  $usuario_id;      
        $object->timestamp =   time() ;  
        $object->save(); 

        
       
        return $object;
       
       
   }
    /***
    * Obtener un periodo por Sku y Existencia
    */
    public static function getPeriodoSkuExistencia($sku){

        $periodoActual= Periodo::buscarPeriodoActual();
        $periodo=$periodoActual->periodo;
        $existencia = Existencia::getExistenciaSkuPeriodo($sku,$periodo);

        return $existencia;


    } 
    /** 
     * Esto es para movimiento de inventario   
     * La recepcion son los pedidos solicitados que se reciben de la mercancias
     * Los despachos son la salidas de mercancias se suponen que van a un almacen para ser procesados a su despacho
     * Los despacho en existencia se agrega al campo salida se supone que va un almacen para su despacho
     * Devolucion se agrega al campo  salida de la  existencia del sku considerado pedido
     * Retornos se ajusta  al campo entrada en existencia del sku de los que son considerados pedidos 
     *  */   
    public static function getPedidosTipo($sku,$tipo){
      
      // $periodoActual= Periodo::buscarPeriodoActual();
      // $fec= strtotime($periodoActual->anio."-".$periodoActual->mes."-01");       
      // $fecha= date('Y-m-d',$fec );  
      
       
            if ($tipo=="Recepcion") {

                $pedidos =  DB::connection('sqlite')->table('pedidos')
                //Recepcion de pedidos
                ->where('provId',"<>",300000) // proveedor para distinguir lo que son de despacho           
                ->where('sku',$sku)      
                ->where('cantPendiente','>',0)                  
                ->get();
            }
            if ($tipo=="Despacho") {
                $pedidos =  DB::connection('sqlite')->table('pedidos')
                //Despachos de productos
                ->where('provId',"=",300000)
                ->where('sku',$sku)            
                ->where('cantPendiente','>',0)                    
                ->get();
        
            }
            if ($tipo=="Devolucion") {
                $pedidos =  DB::connection('sqlite')->table('pedidos')
                //->Select('sku.*')
                ->where('provId',"<>",300000)
                ->where('sku',$sku)            
                ->where('cantPendiente','=',0)                    
                ->get();
        
            }
             if ($tipo=="Retorno") {
                $pedidos =  DB::connection('sqlite')->table('pedidos')
                //->Select('sku.*')
                ->where('provId',"<>",300000)
                ->where('sku',$sku)            
                ->where('cantPendiente','=',0)                    
                ->get();
        
            } 
     
       
         /// dd($pedidos);
 
       
       return $pedidos;


    }



}
