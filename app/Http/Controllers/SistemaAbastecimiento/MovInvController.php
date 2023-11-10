<?php

namespace App\Http\Controllers\SistemaAbastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\Admin\PermisoRol;
use Illuminate\Support\Facades\DB;
use App\Models\SistemaAbastecimiento\MovInv;

class MovInvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $mov = MovInv::getMovInvAll();
        $movInv = serializeJson($mov);         
        $usuario_id= user()->id; 
        $user = UsersRol::getUserRolId($usuario_id);
        $permisorol=PermisoRol::getPermisoRolId($user->rol_id);

        $permiso_status = DB::table('permiso_rol')
            ->join('permiso', 'permiso_rol.permiso_id', '=', 'permiso.id')            
            ->select('permiso.nombre', 'permiso_rol.*')
            ->where('permiso_rol.rol_id',$user->rol_id)
            ->get();         

        $array = array("can_create" => $permiso_status[0]->status, 
                        "can_edit" => $permiso_status[2]->status, 
                        "can_show" => $permiso_status[5]->status,
                        "can_disable" => $permiso_status[4]->status,
                        "can_delete" => $permiso_status[1]->status);  

        $actions = serializeJson($array);

        return view("abastecimiento.transacciones.movinventario.index",compact('movInv', 'actions'));

    }


             /**
     * Display the specified resource.
     */
    public function show(string $movinvId) {
        
       
       
        $movinv = MovInv::getMovInv($movinvId);      
        
        return view('abastecimiento.transacciones.movinventario.show',compact('movinv'));
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
       
        
        return view('abastecimiento.transacciones.movinventario.edit');
 
     }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       

        $existencia = Existencia::actualizarExistenciaSkuPeriodo($request); 

        if ($existencia) {
            return redirect()->route('existencia.list')
                    ->with('success', 'La Existencia se creo correctamente');
           } else {
            return redirect()->route('edit.existencia')
                ->with('danger', 'Error en la edicion de la existencia');
           }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
 
}
