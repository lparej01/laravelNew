<?php

namespace App\Models\Servicios\SoporteTecnico;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class Incidencias extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    protected $fillable = ['nombre'];

     /**
     * Buscar todos los incidencias 
     * 
     */
    public static function getAllIncidencias(){
       

        $incidencias = DB::table('incidencias')                
                 ->orderByDesc('incidencias.id')      
                 ->get();   
 
 
         return  $incidencias;
 
     }

     /**
     * Buscar todos los Incidencias por id
     * 
     */
    public static function getIncidenciasId($id){
       

        $incidencias = DB::table('incidencias')                
                 ->orderByDesc('incidencias.nombre')
                 ->where('id',$id)      
                 ->first();   
 
 
         return  $incidencias;
 
     }
     /**
     * Buscar todos los incidencias diferente del Id
     * 
     */
    public static function getIncidenciasDifId($id){
       

        $incidencias = DB::table('incidencias')                
                 ->orderByDesc('incidencias.nombre')
                 ->where('id',"<>",$id)      
                 ->get();   
 

         return  $incidencias;
 
     }
     public static function crearIncidencia(){

       return Incidencias::create([
           'nombre'  => $request->nombre,
           'created_at' => now(),
           'updated_at' => now()
          
        ]);   



     }
     public static function updateIncidencia($request){
            $object = new Incidencias;  
            $object = Incidencias::find($request->id);  
            $object->nombre = $request->nombre;
            $object->created_at = now();       
            $object->updated_at =   now();             
            $object->save();       
            

     }
    
     /**
     * 
     * Eliminado una inicdencias
     */
    public static function deleteInicidencia($id)
    {
       
              
        return Incidencias::find($id)->delete();
        
    }

    public static function getIncidenciasCount(){

        $inc = DB::connection('sqlite')->table('incidencias')->distinct()->count(); 
        return $inc;

     }



}
