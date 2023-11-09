<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\SistemaAbastecimiento\Proveedores;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores= Proveedores::getProveeodresAll();
        $provee = serializeJson($proveedores);    
        
 

        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        $permisorol=PermisoRol::getPermisoRolId($user->rol_id);

        $permiso_status = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
            ->select('permiso.nombre', 'permiso_rol.*')
            ->where('permiso_rol.rol_id',$user->rol_id)
            ->get();   


      
        $array = array("can_query"=> 1, "can_insert"=>  
                    $permiso_status[0]->status, 
                    "can_update"=>$permiso_status[3]->status,
                    "can_delete"=>$permiso_status[1]->status);    
        $actions = serializeJson($array);

        

        return view("abastecimiento.registros.proveedores.index",compact('provee', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("abastecimiento.registros.proveedores.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        


        $messages = [
           
            'nombre.required'             => 'El nombre del Proveedor es requerido', 'nombre.unique' => 'El nombre ya se encuentra asignado',
            'contacto.required'             => 'El nombre del Contacto es requerido',
            'emailContacto.required'             => 'El email del Contacto es requerido',
            'telefContact.required'             => 'El telefono del Contacto es requerido',
        ];

        $request->validate([
            'nombre'           => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'unique:proveedores', 'min:3', 'max:30'],
            'contacto'           => ['required', 'regex:/^[A-Za-z0-9\s]+$/', 'min:3', 'max:30'],
            'emailContacto'           => ['required', 'unique:proveedores', 'min:3', 'max:30'],
            'telefContact'           => ['required','min:3', 'max:30'],
          
        ], $messages);
       
       
        $getProveedorId = Proveedores::createProveedor($request);
       

       if ($getProveedorId) {
        return redirect()->route('proveedores.list')
                ->with('success', 'El Proveedor se creo correctamente');
       } else {
        return redirect()->route('crear.proveedores')
            ->with('danger', 'Error en la creación del proveedor');
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $provId)
    {
       $proveedor= Proveedores::getProveedorId($provId);



       return view('abastecimiento.registros.proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $provId)
    {
        $proveedor= Proveedores::getProveedorId($provId);
        return view('abastecimiento.registros.proveedores.edit', compact('proveedor'));
    }

    public function disable(string $provId){

        $proveedor= Proveedores::getProveedorId($provId);
        return view('abastecimiento.registros.proveedores.disable', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $provId)
    {
        $proveedor= Proveedores::updateProveedor($request,$provId);

        if ($proveedor) {
            return  redirect()->route('proveedores.list')->with('success', 'Actualizado con exito el proveedor'); 
        } else {
            return redirect()->route('proveedores.list')->with('danger', 'Error al actualizar proveedor'); 
        }
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $provId)
    {
        //
    }
     /**
     * Remove the specified resource from storage.
     */
    public function destroy_confirm(string $provId)
    {
        //
    }
    public function disable_confirm(string $provId){

        $proveedor= Proveedores::disable($provId);

        if ($proveedor) {
            return  redirect()->route('proveedores.list')->with('success', 'Desactivado con exito el proveedor'); 
        } else {
            return redirect()->route('proveedores.list')->with('danger', 'Error al actualizar proveedor'); 
        }
        
        

    }
}

