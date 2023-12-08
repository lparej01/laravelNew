<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Combos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'sqlite';
    
    protected $table="combos";

    protected $guarded = ['id'];

    protected $fillable = [];
   
    
}
