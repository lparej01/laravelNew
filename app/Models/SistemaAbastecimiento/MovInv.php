<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MovInv extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    
    protected $table="movinv";

    protected $guarded = ['id'];

    protected $fillable = [];
}
