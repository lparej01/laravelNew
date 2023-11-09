<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Planes extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    
    protected $table="planes";

    protected $guarded = ['id'];

    protected $fillable = [];
   
}