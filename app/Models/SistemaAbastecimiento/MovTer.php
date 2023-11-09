<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MovTer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    
    protected $table="movter";

    protected $guarded = ['id'];

    protected $fillable = [];
}
