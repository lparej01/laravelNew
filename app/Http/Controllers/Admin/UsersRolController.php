<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use App\Models\Admin\Permiso;
use Illuminate\Support\Facades\DB;

class UsersRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        /**
         * 
         * Permisos de los roles
         * 
         */
        $permiso_status = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
            ->select('permiso.nombre', 'permiso_rol.*')
            ->where('permiso_rol.rol_id',$user->rol_id)
            ->get();   

        
        $array = array("can_query"=> 1, "can_insert"=>  $permiso_status[0]->status, "can_update"=>$permiso_status[3]->status,"can_delete"=>$permiso_status[1]->status);    
        
        
        $actions = serializeJson($array);
        
        $usersrol= UsersRol::getAllUsersRol();

        $usersroles = serializeJson($usersrol);

       // dd( $actions);
        
        return view('admin.usersrol.index', compact('usersroles', 'actions'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $usersrol=UsersRol::getUserRolId($id); 
        return view('admin.usersrol.show', compact('usersrol','id'));
          
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $usersrol=UsersRol::getUserRolId($id);        
           
        return view('admin.usersrol.edit', compact('usersrol','id'));
          

       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       // dd($request->all()); 

        $Object = UsersRol::find($id);
            $Object ['estado']  =  $request->estado;            
            $Object ->save();


        return redirect()->route('users.rol.list')->with('success', 'El usuario se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
