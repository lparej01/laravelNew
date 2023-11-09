<?php

namespace App\Models\SistemaAbastecimiento;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CombosCategorias extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   
    
    protected $table="comboscategorias";

    protected $guarded = ['id'];

    protected $fillable = [];
    
}
