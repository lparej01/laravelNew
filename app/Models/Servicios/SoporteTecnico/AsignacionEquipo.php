<?php

namespace App\Models\Servicios\SoporteTecnico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class AsignacionEquipo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];
    protected $table="asignacion_equipos";

    protected $fillable = ['equipo_asignado_person','tipo_equipo','teclado_serial','mouse','cpu_serial','oficina'
                            ,'conector_internet','conector_corriente_cpu','conector_corriente_monitor','correo_electronico',
                            'status','procesador','disco','any_desk','comentario'];


   /**
     * Buscar todos los departamentos 
     * 
     */
    public static function getAllEquipos(){
       

        $equipos = DB::table('asignacion_equipos')                
                 ->orderByDesc('asignacion_equipos.equipo_asignado_person')      
                 ->get();   
 
 
         return  $equipos;
 
     }
   
   
                            /**
     * Buscar el  equipo asignados por id
     * 
     */
    public static function getAsignacionId($id){
       

        $asign = DB::table('asignacion_equipos')                
                 ->orderByDesc('asignacion_equipos.equipo_asignado_person')
                 ->where('id',$id)      
                 ->first();   
 
 dd( $asign);
         return  $asign;
 
     }

}
