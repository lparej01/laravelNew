<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class Permiso extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   

    

    protected $table="permiso";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'status'
        
    ];
    protected $guarded = ['id'];

    public static function getPermisosAll()
    {
       
       
        return DB::table('permiso')
        ->select('permiso.id','permiso.nombre',DB::raw("(CASE WHEN permiso.status =1  THEN 'Activo' WHEN permiso.status=0 THEN 'Inactivo' END) as status"))
        ->get(); 
       
    }

    public static function getPermisoId($id)
    {
        $permiso=DB::table('permiso')->where('id',$id)->first();        
       
        return $permiso ;
    }


}
