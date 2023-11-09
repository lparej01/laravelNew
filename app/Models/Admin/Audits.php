<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Audits extends Model
{
    
    
   
    protected $table = "audits";
    protected $fillable = ['id',
                            'user_type',
                            'user_id',
                            'event',
                            'auditable_type',
                            'auditable_id',
                            'old_values',
                            'new_values',
                            'url',
                            'ip_address',
                            'user_agent',
                            'tags',
                            'created_at',
                            'updated_at'];
    protected $guarded = ['id'];


    public static function getAudits()
    {
               
       
        return DB::table('audits')->get();  
    }
    

}
