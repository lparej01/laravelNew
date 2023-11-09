<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;

class UsersRol extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   

   
    protected $table="users_rol";
    protected $fillable = ['rol_id','usuario_id','estado'];
    protected $guarded = ['id'];

    public static function getUserRolId($id)
    {
        $usersrol=DB::table('users_rol as usrol')
            ->join('rol', 'rol.id', '=', 'usrol.rol_id')
            ->join('users', 'users.id', '=', 'usrol.usuario_id')
            ->select('rol.nombre','usrol.*','users.username',DB::raw("(CASE WHEN usrol.estado =true  THEN 'Activo' WHEN usrol.estado=false THEN 'Inactivo' END) as estado"))       
            ->where('usrol.rol_id', $id)->first();        
       
        return $usersrol ;
    }

    public static function getUserRol($id)
    {
        $usersrol=self::select('rol_id')->where('rol_id', $id)->get();        
       
        return $usersrol ;
    }

    public static function getAllUsersRol(){

         $usersroles =DB::table('users_rol as usr')
         ->join('rol', 'rol.id', '=', 'usr.rol_id')
         ->join('users', 'usr.usuario_id', '=', 'users.id')
        ->select('rol.nombre as rol','usr.id','usr.usuario_id',DB::raw("(CASE WHEN usr.estado =true  THEN 'Activo' WHEN usr.estado=false THEN 'Inactivo' END) as estado"),'users.username')->get();          


        return  $usersroles;       
       
    }
    
}
