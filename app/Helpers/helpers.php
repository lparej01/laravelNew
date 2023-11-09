<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;
use App\Models\Users\UserHasRolModel;
use App\Models\Rols\RolesAndPermissionsSpatie;
use App\Models\Admin\UsersRol;
use Illuminate\Support\Facades\DB;


if (!function_exists('user')) {
    /**
     * Get the authenticated user.
     *
     * @return \App\Models\Auth\User
     */
    function user()
    {
        $user = auth()->user();

      //  dd( $user->name );
        return $user;
    }
    
}



if (!function_exists('user_id')) {
    /**
     * Get id of current user.
     *
     * @return int
     */
    function user_id()
    {
        return optional(user())->id;
    }
}

if (function_exists('user')) {

    function getSession($arg)
    {
        return session($arg);
    }

    function serializeJson($arg)
    {
        return json_encode($arg);
    }

    function encryptString($token)
    {
        return Crypt::encryptString($token);
    }

    function decryptString($token)
    {
        return Crypt::decryptString($token);
    }

    function getCurrentRoute()
    {
      
      $rutas="";
      switch (Route::current()->action['as']) {
        case "inicio":
            $rutas = "Inicio del Sistema";
            break;
        case "rol.list":
           $rutas = "Ver Roles ";
           break;
        case "create_rol":
           $rutas = "Crear un Rol ";
           break;
        case "edit_rol":
           $rutas = "Editar Rol ";
           break;
        case "audits":
            $rutas = "Auditoria ";
           break;           
        case "permiso.list":
            $rutas = "Ver  Permisos ";
            break;  
        case "crear.permiso":
            $rutas = "Crear permisos ";
            break;  
        case "edit.permiso":
            $rutas = "Editar Permisos ";
            break;
        case "permiso.rol.list":
            $rutas = "Ver Permisos Roles ";
            break;  
        case "edit.permiso.rol":
            $rutas = "Editar Permisos Roles ";
            break;  
        case "save_permiso.rol":
            $rutas = "Crear Permisos Roles ";
            break;
        case "users.rol.list":
            $rutas = "Ver Usuarios con Roles ";
            break;  
        case "create.users.rol":
            $rutas = "Crear Usuarios Roles ";
            break;  
        case "save.users.rol":
            $rutas = "Crear Usuarios Roles ";
            break;
        case "user.list":
            $rutas = "Ver Usuarios ";
            break;  
        case "edit.user":
            $rutas = "Editar Usuarios";
            break;
        case "user.create":
            $rutas = "Crear Usuario";
            break; 
        case "menu.list":
            $rutas = "Ver Menu";
            break;  
        case "create_menu":
            $rutas = "Crear menu";
            break; 
        case "edit_menu":
            $rutas = "Editar menu";
            break; 
        case "menu_rol.list":
            $rutas = "Ver menu-Rol";
            break; 
        case "proveedores.list":
            $rutas = "Ver Proveedores";
            break; 
        case "crear.proveedores":
            $rutas = "Crear Proveedores";
            break;
        case "edit.proveedores":
            $rutas = "Editar Proveedores";
            break; 
        case "catalogos.list":
                $rutas = "Ver Catalogos";
                break; 
         case "edit.catalogos":
                $rutas = "Editar Catalogo";
                break;
         case "crear.catalogos":
                $rutas = "Crear Catalogos";
                break; 

         case "periodo.list":
                    $rutas = "Ver Periodos";
                    break; 
         case "edit.periodo":
                    $rutas = "Editar Periodo";
                    break;
        case "crear.periodo":
                    $rutas = "Crear Periodos";
                    break; 
         case "generar.periodo":
                $rutas = "Generar Periodos";
                break; 
         case "categorias.list":
                    $rutas = "Ver Categorias";
                    break;
        case "edit.categorias":
                    $rutas = "Editar Categorias";
                    break; 
         case "crear.categorias":
                $rutas = "Crear Categorias";
                break; 

                    
        default:
        $rutas=Route::current()->action['as'];
      }
   
        return $rutas;
    }

    

    function getValuesFromAssignedUser($url = NULL)
    {
       
     
         
        return serializeJson(
            getSession("rolActions")[$url ?? getCurrentRoute()]
        );
    }

    function getValueSession($name){

        
        return getSession($name);
    }

    function isSuperUser()
    {
       
        $user = UsersRol::getUserRol(user_id()); 

       
        return in_array(["rol_id" => 1], $user->toArray());
    }
   

}


if (!function_exists('should_queue')) {
    /**
     * Check if queue is enabled.
     *
     * @return bool
     */
    function should_queue() {
        return config('queue.default') != 'sync';
    }
}
