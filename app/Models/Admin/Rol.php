<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;

class Rol extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;    

    protected $table="rol";
    protected $guarded = ['id'];

    protected $fillable = ['nombre'];
    
    public static function Roles()
    {
        return DB::table('rol')->get();
    }

    public static function getRolId($rolId)
    {
        return  DB::table('rol')              
        ->where('rol.id', $rolId)->first();        
       
       
    }


    


}
