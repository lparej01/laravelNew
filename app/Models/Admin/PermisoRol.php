<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;

class PermisoRol extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $table="permiso_rol";

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rol_id',
        'permiso_id',
        'status'
    ];
    

    public static function getPermisoRolId($id)
    {
        $permisorol=DB::table('permiso_rol as per')->join('rol', 'rol.id', '=', 'per.rol_id')
            ->select('rol.nombre','per.rol_id','per.*')       
            ->where('per.rol_id', $id)->get();        
       
        return $permisorol ;
    }
    
    public static function getPermiso($permisoid)
    {
        $permisorol=DB::table('permiso_rol as p')              
            ->where('p.permiso_id', $permisoid)->first();        
       
        return $permisorol ;
    }
    
    public static function getPermisoRol($rolId,$permisoId)
    {
        $permisorol=DB::table('permiso_rol as p')              
            ->where('p.permiso_id', $permisoId)->where('p.rol_id', $rolId)->first();        
       
        return $permisorol ;
    }
    
    public static function getPermisoPorRol($rolId)
    {
        $permisorol=DB::table('permiso_rol as p')              
            ->where('p.rol_id', $rolId)->get();        
       
        return $permisorol ;
    }
    public static function getId($id)
    {
        $permisorol=DB::table('permiso_rol')              
            ->where('id', $id)->first();        
       
        return $permisorol ;
    }

}
