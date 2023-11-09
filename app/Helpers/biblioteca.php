<?php

use App\Models\Admin\Permiso;
use Illuminate\Database\Eloquent\Builder;



/*****
 * Permisos relacionados con roles
*/
if (!function_exists('can')) {
    function can($permiso, $redirect = true)
    {
        if (session()->get('name_rol') == 'Administrator') {
            return true;
        } else {
            $rolId = session()->get('rol_id');
            $permisos = cache()->tags('Permiso')->rememberForever("Permission.rolid.$rolId", function () {
                return Permission::whereHas('roles', function ($query) {
                    $query->where('rol_id', session()->get('rol_id'));
                })->get()->pluck('permission_uppercase')->toArray();
            });
           // dd($permisos);
            if (!in_array($permiso, $permisos)) {
                if ($redirect) {
                    if (!request()->ajax())
                        return redirect()->route('inicio')->with('mensaje', 'No tienes permisos para entrar en este modulo')->send();
                    abort(403, 'No tiene permiso');
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}
