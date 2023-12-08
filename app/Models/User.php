<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, Notifiable;
    
    protected $connection = 'sqlite_1';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'names',
        'surnames',
        'email',        
        'password',
        'images',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'user_rol');
    }

    public function setSession($roles) {
     
      
        if (count($roles) == 1) {
                      
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'name_rol' => $roles[0]['nombre'],
                    'user_id' => $this->id,
                    'username' => $this->username,
                    //'name' => $this->name,
                   // 'ruta_img' => $this->ruta_img
                   
                   
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
    }
        public static function getEmail($email)       {
           
            
            return  DB::table('users')->where('email', $email)->first();
        }


        public static function getAllUsers(){
           
            
            $users = DB::table('users')                 
            ->select('users.id',
            'users.username',
            'users.names', 
            'users.surnames', 
            'users.email', 
            'users.images',
             DB::raw("(CASE WHEN users.status = 1  THEN 'Activo' WHEN users.status = 0 THEN 'Inactivo' END) as status "), 
            )->get();   

            
         
            
            return  $users;       
       
        }

        public static function getUserId($id)       {
           
            
            return  DB::table('users')->where('id',$id)->first();       
       
        }


}



