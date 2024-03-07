<?php

namespace App\Models\Servicios\SoporteTecnico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios\SoporteTecnico\SoporteTecnico;

class Departamentos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];

    protected $fillable = ['nombre'];

     /**
     * Buscar todos los departamentos 
     * 
     */
    public static function getAllDepartamentos(){
       

        $departamentos = DB::table('departamentos')                
                 ->orderByDesc('departamentos.nombre')      
                 ->get();   
 
 
         return  $departamentos;
 
     }

     /**
     * Buscar todos los departamentos por id
     * 
     */
    public static function getDepartamentosId($id){
       

        $departamentos = DB::table('departamentos')                
                 ->orderByDesc('departamentos.nombre')
                 ->where('id',$id)      
                 ->first();   
 
 
         return  $departamentos;
 
     }
    /**
     * Buscar todos los departamentos diferente del Id
     * 
     */
    public static function getDepartamentosDifId($id){
       

        $departamentos = DB::table('departamentos')                
                 ->orderByDesc('departamentos.nombre')
                 ->where('id',"<>",$id)      
                 ->get();   
 
       
         return  $departamentos;
 
     }
    public static function crearDepartamento(){

        return Departamentos::create([
            'nombre'  => $request->nombre,
            'created_at' => now(),
            'updated_at' => now(),
             'timestamp' => time()   
                    
            
         ]);   
 
 
 
    }
 
      public static function updateDepartamentos($request){
        $object = new Departamentos;  
        $object = Departamentos::find($request->id);  
        $object->nombre = $request->nombre;
        $object->created_at = now();       
        $object->updated_at =   now();             
        $object->save();       
        

    }
    /**
     * 
     * Eliminado una inicdencias
     */
    public static function deleteDepartamentos($id)
    {
       
              
        $buscarId=SoporteTecnico::getDepId($id);
       
       

        if ($buscarId == 0) {
           
           return  Departamentos::find($id)->delete();
             
        } else {
           
            return false;        
        }

       
       
       
        
    }

    public static function getDepartamentosCount(){

        

        $dep = DB::connection('sqlite')->table('departamentos')->distinct()->count(); 

        return $dep;

     }


}
