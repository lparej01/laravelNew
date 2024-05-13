<?php

namespace App\Models\SistemaAbastecimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;


class Proveedores extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $connection = 'sqlite';
    
    protected $table="proveedores";

    protected $guarded = ['provId'];

    public $timestamps = false;
  

    const UPDATED_AT = null;

    const CREATED_AT = null;

    /***definicion de la clave primaria cuando no es id */
    protected $primaryKey = "provId";
           
    protected $fillable = ['nombre','contacto','telf1','telf2','telfContacto','email','emailContacto','activo','timestamp','usuario'];

    /**
     * Obtener todos los proveedores
     */
    public static function getProveeodresAll()
    {
        $proveedores=DB::connection('sqlite')->table('proveedores')->where('activo',1)->where('provId',"<>",300000 )->get();        
       
        return $proveedores ;
    }
    /**
     * Contar todos los proveedores
     */
    public static function contProveeodres()
    {
        $proveedores=DB::connection('sqlite')
                        ->table('proveedores')
                        ->where('activo',1)->count();      
                       
        return number_format($proveedores,2, ",", ".");  
    }

    /**
     * obtener un proveedor por Id
     * 
     */
    public static function getProveedorId($provId){

        $proveedores=DB::connection('sqlite')->table('proveedores')->where('provId',$provId)->first();        

        return $proveedores;
    }

    /**
     * Crear un Proveedor
     */
    public static function createProveedor($request)
    {
        $usuario_id= user()->username; 
       
        $getProveedor= Proveedores::create([
            'nombre'  => $request->nombre,
            'contacto'  => $request->contacto,
            'telf1'  => $request->telf1,
            'telf2'  => $request->telf2,
            'telfContacto'  => $request->telfContacto,
            'email'  => $request->email,
            'emailContacto'  => $request->emailContacto,
            'activo'  => 1,
            'usuario'  => $usuario_id,           
            'timestamp' => time()   
                   
           
        ]);   
        
        /**retorna true */
        return $getProveedor;
        
    }

    /**
     * Actualizar un proveedor
     * 
     */
    public static function updateProveedor($request,$provId){

        $usuario_id= user()->username; 
       

        $object = new Proveedores;            
        $object = Proveedores::find($provId);  
        $object->nombre = $request->nombre;
        $object->contacto =  $request->contacto;       
        $object->telf1 =   $request->telf1;      
        $object->telf2 =  $request->telf2;      
        $object->telfContacto =  $request->telfContacto;      
        $object->email =  $request->email;      
        $object->emailContacto =   $request->emailContacto;   
        $object->usuario =  $usuario_id;      
        $object->timestamp =   time() ;  
        $object->save();


        return $object;

    } 
    /**
     * 
     * Eliminar un Proveedor
     */
    public static function deleteProveedor($provId){

        return Proveedores::find($provId)->delete();

    }
    public static function disable($provId){

        $usuario_id= user()->username; 
    
        $object = new Proveedores;            
        $object = Proveedores::find($provId);       
        $object->activo =0;
        $object->usuario =  $usuario_id;      
        $object->timestamp =   time() ;  
        $object->save();


        return $object;

    }

      


}