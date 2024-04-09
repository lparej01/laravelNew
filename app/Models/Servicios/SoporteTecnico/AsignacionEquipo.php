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
    protected $table="equipos_asignados";

    protected $fillable = ['equipo_asignado_person','tipo_equipo','teclado_serial','mouse','cpu_serial','oficina'
                            ,'conector_internet','conector_corriente_cpu','conector_corriente_monitor','correo_electronico',
                            'status','procesador','disco','any_desk','comentario'];


   /**
     * Buscar todos los departamentos 
     * 
     */
    public static function getAllEquipos(){
       

        $equipos = DB::table('equipos_asignados')                
                 ->orderByDesc('equipos_asignados.equipo_asignado_person')      
                 ->get();   
 
 
         return  $equipos;
 
     }
   
   
                            /**
     * Buscar el  equipo asignados por id
     * 
     */
    public static function getAsignacionId($id){
       

        $asign = DB::table('equipos_asignados as eq')
        ->select('eq.id',      
        'eq.equipo_asignado_person',
        'eq.oficina',
        'eq.tipo_equipo',
        'eq.teclado_marca',
        'eq.teclado_serial',
        'eq.mouse_serial', 
        'eq.mouse_marca', 
        'eq.monitor_serial', 
        'eq.monitor_marca', 
        'eq.cpu_serial', 
        'eq.cpu_marca', 
        'eq.tipo_procesador', 
        'eq.memoria_ram', 
        'eq.disco', 
        'eq.any_desk', 
        'eq.sistema_oper',  
        'nombre_equipo',
        'correo_electronico',         
                    DB::raw("(CASE WHEN eq.conector_internet = 1  THEN 'Conector Internet' 
                    WHEN eq.conector_internet= 0 THEN 'No tiene Conector' END) as Conect_Internet"),

                    DB::raw("(CASE WHEN eq.conector_corriente_cpu = 1  THEN 'CPU_CTE' 
                    WHEN eq.conector_corriente_cpu=0 THEN 'No tiene Conector' END) as Conect_CPU_Cte"),

                    DB::raw("(CASE WHEN eq.conector_corriente_monitor = 1  THEN 'CTE_MONITOR' 
                    WHEN eq.conector_corriente_monitor=0 THEN 'No tiene Conector' END) as Conect_CTE_MONITOR"),

                    DB::raw("(CASE WHEN eq.conector_cpu_monitor = 1  THEN 'CPU_MONITOR' 
                    WHEN eq.conector_cpu_monitor=0 THEN 'No tiene Conector' END) as Conect_CPU_MONITOR"),

                    DB::raw("(CASE WHEN eq.dominio_sistema = 1  THEN 'Registrado en el Dominio' 
                    WHEN eq.dominio_sistema = 0 THEN 'No esta en el dominio' END) as dominio"),                   
                    
                    DB::raw("(CASE WHEN eq.status = 1  THEN 'Activo' 
                    WHEN eq.status=0 THEN 'Desactivdo' END) as Status"))  

                 ->where('id',$id)      
                 ->get();

         return  $asign;
 
     }

}
