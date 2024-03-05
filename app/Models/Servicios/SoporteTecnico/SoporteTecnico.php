<?php

namespace App\Models\Servicios\SoporteTecnico;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use Arr;

class SoporteTecnico extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'sqlite';
    
    protected $table="soporte";

    protected $guarded = ['id'];    

    public $timestamp = false;

    const UPDATED_AT = null;

    const CREATED_AT = null;

    protected $fillable = ['usuarios','depart_id','incid_id','comentario','sopt1','status','created_at'];
    
    protected $casts = [
      'sopt1' => 'integer',
    ];


     /**
     * Buscar todos los Soporte tabla de servicos vista principal
     * 
     */
    public static function getSoporteTecnico(){

         
        $soporte = DB::connection('sqlite')->table('soporte') 
                  ->join('departamentos', 'departamentos.id', '=', 'soporte.depart_id')              
                  ->select('soporte.id',
                     'soporte.usuarios',
                     'soporte.depart_id',
                     'soporte.incid_id as incidencias',
                     'soporte.comentario',
                     'soporte.users',
                     'soporte.created_at',
                     'departamentos.nombre as departamentos',             
                     DB::raw("(CASE WHEN soporte.status = 1  THEN 'En proceso' WHEN soporte.status=2 THEN 'Caso cerrado' END) as status"))                                     
                     ->orderBy('soporte.id','DESC')
                     ->groupBy('soporte.id') 
                     ->get();
          
  
          return $soporte;
    
     }
     public static function getIncidencias(){

      $inc = DB::connection('sqlite')->table('soporte')                  
      ->select(      
         'soporte.incid_id as incidencias')                                     
         ->orderBy('soporte.id','DESC')
         ->groupBy('soporte.id') 
         ->get();

      $plucked = $inc->pluck('incidencias');

      return $plucked;


     }
     /***
      * Buscar por el identificador o id 
      *
      */
     public static function getSoporteTecnicoId($id){

        /////obtengo por el id
        $sop = DB::connection('sqlite')->table('soporte')
        ->where('id',$id)       
        ->first();  
       
       
        return $sop;
    
     }
     /***
      * Para la vista modal show por el id 
      *
      */
     public static function getSoporteTecnicoIdShow($id){

        /////obtengo por el id
        $soporte = DB::connection('sqlite')->table('soporte') 
                   ->join('departamentos', 'soporte.depart_id', '=', 'departamentos.id')             
                   ->select('soporte.id', 'soporte.usuarios','soporte.comentario','soporte.incid_id as incidencias',                  
                   'departamentos.nombre as departamentos'
                  ) 
                  ->where('soporte.id',$id)        
                  ->first();
       
        return $soporte;
    
     }
      /**
     * 
     * Eliminado una inicdencias
     */
    public static function deleteSoporte($id)    {
       
              
        return SoporteTecnico::find($id)->delete();
        
    }
    /***
     * Consulta para contar
     * 
     */
     public static function soporteUsuarios(){

        $soporte = DB::connection('sqlite')->table('soporte')->distinct()->count(); 
        return $soporte;

     }
     /***
      * 
      *Todos los usuarios me los cuenta
      * */
     public static function getInicUsuarios(){

        $data= SoporteTecnico ::select('soporte.usuarios')
        ->selectRaw('count(incid_id) as incidencias')
        ->groupBy('soporte.usuarios')      
        ->get();

        $plucked = $data->pluck('usuarios');

        return $plucked; 

       
     }

     /***
      * Me busca por mes
      **
      * */
     public static function getInic(){

        $data= SoporteTecnico ::select('soporte.usuarios')
        ->selectRaw('count(incid_id) as incidencias')
        ->groupBy('soporte.usuarios') 
        ->whereMonth('created_at', '02')
        ->get();

        $plucked = $data->pluck('incidencias');

        return json_decode($plucked); 


       
     }
     /***
      * 
      *Me suma las incidencia por departamentos en general
      *
      */
     public static function getIncCantidad(){
      

       $getSuma = DB::table('soporte') 
                ->join('departamentos', 'soporte.depart_id', '=', 'departamentos.id')                          
                 ->select(                        
                         DB::raw('CAST(sum(sopt1) as CountSum) AS cantidad')                     
                         )                
                 ->groupBy('depart_id')                  
                 ->get();
                
         $pluck = $getSuma->pluck('cantidad');       

      return  $pluck;

      
     }

     /***
      * 
      *Me suma las incidencia por departamentos en general
      *
      */
      public static function getIncDepartNombre(){
      

         $getSuma = DB::table('soporte') 
                  ->join('departamentos', 'soporte.depart_id', '=', 'departamentos.id')                          
                   ->select('departamentos.nombre as depart')                
                   ->groupBy('depart_id')                     
                   ->get();
  
         $pluck = $getSuma->pluck('depart');
               
         return  $pluck ;
  
        
       }
     /***
      * 
      *Me suma las incidencia por departamentos por mes
      *
      */
      public static function getIncDepartMes($mes){
      

         $getSuma = DB::table('soporte') 
                  ->join('departamentos', 'soporte.depart_id', '=', 'departamentos.id')                          
                   ->select('departamentos.nombre as depart',                        
                           DB::raw('CAST(sum(sopt1) as CountSum) AS cantidad'),
                           'soporte.created_at as fecha', 
                           )                
                   ->groupBy('depart_id')
                   ->whereMonth('fecha','=',$mes)   
                   ->get();
  
                   
  
        return  $getSuma;
  
       }
      /***
      * 
      * Me suma las incidencia totales
      *
      */
      public static function getCountInc(){
           
       
         $getIncid = DB::table('incidencias')->select('id','nombre')->get();  
         $pluck = $getIncid->pluck('nombre');        

        

         foreach ($getIncid as $plucked) {
              /**Convertir el stdclass en un array */
               $array[] = DB::table('soporte')                                       
               ->selectRaw('count(incid_id) ' .str_replace(' ','' ,$plucked->nombre))                  
               ->where('incid_id','like', '%'.$plucked->nombre.'%')                             
               ->first(); 
          
                      
         }

                        //nuevo arreglo
                         $val = array(
                         "Telefonia" => $array[0]->Correo, 
                          "ERP" => $array[1]->ERP,
                          "Hadware" => $array[2]->Hardware, 
                          "Impresion" =>  $array[3]->Impresion,
                          "Power BI" =>  $array[4]->PowerBI,
                          "Red" =>  $array[5]->Red,
                          "Respaldo" =>  $array[6]->Respaldo,
                          "Servicios de Mantenimiento" =>  $array[7]->ServiciosdeMantenimiento,                         
                          "Software" =>  $array[8]->Software,                        
                          "Telefonia" =>  $array[9]->Telefonia
                         
                        );   
                         
        
         //dd($val); 
            

           
         return  $val; 
  
       }
         /***
      * 
      * Me suma las incidencia por departamentos por mes
      *
      */
      public static function getCountIncMonth($month){
           
       
         $getIncid = DB::table('incidencias')->select('id','nombre')->get();  
         $pluck = $getIncid->pluck('nombre');
        

        

         foreach ($getIncid as $plucked) {
              /**Convertir el stdclass en un array */
               $array[] = DB::table('soporte')                                       
               ->selectRaw('count(incid_id) ' .str_replace(' ','' ,$plucked->nombre))                  
               ->where('incid_id','like', '%'.$plucked->nombre.'%')
               ->whereMonth('created_at', $month)               
               ->first(); 
          
                      
         }

                        //nuevo arreglo
                         $val = array(
                         "Telefonia" => $array[0]->Correo, 
                          "ERP" => $array[1]->ERP,
                          "Hadware" => $array[2]->Hardware, 
                          "Impresion" =>  $array[3]->Impresion,
                          "Power BI" =>  $array[4]->PowerBI,
                          "Red" =>  $array[5]->Red,
                          "Respaldo" =>  $array[6]->Respaldo,
                          "Servicios de Mantenimiento" =>  $array[7]->ServiciosdeMantenimiento,                         
                          "Software" =>  $array[8]->Software,                        
                          "Telefonia" =>  $array[9]->Telefonia
                         
                        );   
                         
        
        
            

           
         return  $val; 
  
       }
}
