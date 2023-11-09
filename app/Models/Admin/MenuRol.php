<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MenuRol extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    
    

    protected $table="menu_rol";

    protected $guarded = ['id'];

    protected $fillable = ['rol_id','menu_id'];
}
