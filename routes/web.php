<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\PermisoRolController;
use App\Http\Controllers\Admin\AuditsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   
  return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
Route::get('/logout', [HomeController::class, 'destroy'])->name('log_out');
Route::get('login/forgot.password', [ResetPasswordController::class, 'sendEmail'])->name('forgot.password');
//Route::get('login/reset.password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');

Route::get('user/create', [UsersController::class,'create'])->name('user.create');
Route::post('user/store', [UsersController::class,'store'])->name('store.user');

/***
 * 
 * SISTEMAS 
 * 
 */
Route::group(['prefix' => 'servicios', 'namespace' => 'App\Http\Controllers\Servicios', 'middleware' => ['auth']], function () {
  
  /////Soporte Tecnico 

  Route::get('soportetecnico', 'SoporteController@index')->name('soporte.list');    
  Route::get('soportetecnico/edit/{id}', 'SoporteController@edit')->name('edit.soporte');
  Route::delete('soportetecnico/{id}/destroy', 'SoporteController@destroy')->name('destroy.soporte');
  Route::get('soportetecnico/show/{id}', 'SoporteController@show')->name('soporte.show'); 
  Route::get('soportetecnico/delete/{id}', 'SoporteController@destroy')->name('soporte.delete'); 
  Route::get('soportetecnico/delete_confirm/{id}', 'SoporteController@delete_confirm')->name('soporte.delete_confirm');
  Route::get('soportetecnico/create', 'SoporteController@create')->name('crear.soporte');
  Route::post('soportetecnico', 'SoporteController@store')->name('save.soporte');
  Route::post('soportetecnico/{id}', 'SoporteController@update')->name('update.soporte');
  Route::get('soportetecnico/reporte', 'SoporteController@reporte')->name('reporte.soporte');



  Route::get('asignacion', 'AsignacionController@index')->name('asignacion.list');    
  Route::get('asignacion/edit/{id}', 'AsignacionController@edit')->name('edit.asignacion');
  Route::post('asignacion/{id}', 'AsignacionController@update')->name('update.asignacion');
  Route::delete('asignacion/{id}/destroy', 'AsignacionController@destroy')->name('destroy.asignacion');
  Route::get('asignacion/show/{id}', 'AsignacionController@show')->name('asignacion.show'); 
  Route::get('asignacion/disable/{id}', 'AsignacionController@disable')->name('asignacion.disable'); 
  Route::get('asignacion/disable_confirm/{id}', 'AsignacionController@disable_confirm')->name('asignacion.disable_confirm');
  Route::get('asignacion/create', 'AsignacionController@create')->name('crear.asignacion');
  Route::post('asignacion', 'AsignacionController@store')->name('save.asignacion');
 

  Route::get('incidencias', 'IncidenciasController@index')->name('incidencias.list');    
  Route::get('incidencias/edit/{id}', 'IncidenciasController@edit')->name('edit.incidencias');
  Route::post('incidencias/{id}', 'IncidenciasController@update')->name('update.incidencias');
  Route::delete('incidencias/{id}/destroy', 'IncidenciasController@destroy')->name('destroy.incidencias');
  Route::get('incidencias/show/{id}', 'IncidenciasController@show')->name('incidencias.show'); 
  Route::get('incidencias/delete/{id}', 'IncidenciasController@destroy')->name('incidencias.delete'); 
  Route::get('incidencias/delete_confirm/{id}', 'IncidenciasController@delete_confirm')->name('incidencias.delete_confirm');
  Route::get('incidencias/create', 'IncidenciasController@create')->name('crear.incidencias');
  Route::post('incidencias', 'IncidenciasController@store')->name('save.incidencias'); 

  Route::get('departamentos', 'DepartamentosController@index')->name('departamentos.list');    
  Route::get('departamentos/edit/{id}', 'DepartamentosController@edit')->name('edit.departamentos');
  Route::post('departamentos/{id}', 'DepartamentosController@update')->name('update.departamentos');
  Route::get('departamentos/show/{id}', 'DepartamentosController@show')->name('departamentos.show'); 
  Route::get('departamentos/delete/{id}', 'DepartamentosController@destroy')->name('departamentos.delete'); 
  Route::get('departamentos/delete_confirm/{id}', 'DepartamentosController@delete_confirm')->name('departamentos.delete_confirm');
  Route::get('departamentos/create', 'DepartamentosController@create')->name('crear.departamentos');
  Route::post('departamentos', 'DepartamentosController@store')->name('save.departamentos');

 

  
    

       

  
});

/***
 * 
 * SISTEMAS 
 * 
 */
Route::group(['prefix' => 'pdf', 'namespace' => 'App\Http\Controllers\PDF', 'middleware' => ['auth']], function () {
  
  /////Soporte Tecnico 
  Route::get('soportetecnicopdf', 'PdfController@index')->name('soportepdf.list');    
 
  
});


/**
 * 
 * Administradores
 */
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'superadmin']], function () {
    
        /*RUTAS DE USUARIO*/
     Route::get('user', 'UsersController@index')->name('user.list');    
     Route::get('user/edit/{id}', 'UsersController@edit')->name('edit.user');
     Route::post('user/{id}', 'UsersController@update')->name('update.user');
     Route::delete('user/{id}/destroy', 'UsersController@destroy')->name('destroy.user');
     Route::get('user/show/{id}', 'UsersController@show')->name('user.show'); 
     Route::get('user/disable/{id}', 'UsersController@disable')->name('user.disable'); 
     Route::get('user/disable_confirm/{id}', 'UsersController@disable_confirm')->name('user.disable_confirm');


    /*RUTAS DE USUARIO ROLES*/
     Route::get('usersrol', 'UsersRolController@index')->name('users.rol.list');
    Route::get('usersrol/create', 'UsersRolController@create')->name('create.users.rol');
    Route::post('usersrol/save', 'UsersRolController@store')->name('save.users.rol');
    Route::get('usersrol/edit/{id}/', 'UsersRolController@edit')->name('edit.users.rol');
    Route::post('usersrol/{id}', 'UsersRolController@update')->name('update.users.rol');
    Route::get('usersrol/delete_confirm/{id}', 'UsersRolController@delete_confirm')->name('users.rol.delete_confirm');
    Route::get('usersrol/show/{id}', 'UsersRolController@show')->name('users.rol.show'); 
     
     /*RUTAS DE PERMISO*/
     Route::get('permiso', 'PermisoController@index')->name('permiso.list');
     Route::get('permiso/crear', 'PermisoController@create')->name('crear.permiso');
     Route::post('permiso', 'PermisoController@store')->name('save.permiso');
     Route::get('permiso/edit/{id}', 'PermisoController@edit')->name('edit.permiso');
     Route::post('permiso/update/{id}', 'PermisoController@update')->name('update.permiso');
     Route::get('permiso/delete/{id}', 'PermisoController@delete')->name('permiso.delete');
     Route::get('permiso/delete_confirm/{id}', 'PermisoController@delete_confirm')->name('permiso.delete_confirm');
     Route::get('permiso/show/{id}', 'PermisoController@show')->name('permiso.show');
     
     
     
      /**ROL*/
      Route::get('rol', 'RolController@index')->name('rol.list');
      Route::get('rol/create', 'RolController@create')->name('create_rol');
      Route::get('rol/edit/{id}', 'RolController@edit')->name('edit_rol');
      Route::post('rol/update/{id}', 'RolController@update')->name('update_rol');
      Route::post('rol', 'RolController@store')->name('save_rol');
      Route::delete('rol/{id}/destroy', 'RolController@destroy')->name('destroy_rol');
      Route::get('rol/show/{id}', 'RolController@show')->name('rol.show');
      Route::get('rol/delete/{id}', 'RolController@delete')->name('rol.delete');
      Route::get('rol/delete_confirm/{id}', 'RolController@delete_confirm')->name('rol.delete_confirm');
    
  
       /*RUTAS PERMISO_ROL*/
       Route::get('permiso.rol', 'PermisoRolController@index')->name('permiso.rol.list');
       Route::get('permisorol/create', 'PermisoRolController@create')->name('permiso.rol.create');
       Route::post('permisorol', 'PermisoRolController@salve')->name('guardar.permiso.rol');       
       Route::get('permisorol/edit/{id}', 'PermisoRolController@edit')->name('edit.permiso.rol');
       Route::post('permisorol/update/{id}', 'PermisoRolController@update')->name('update.permiso.rol');   
       Route::get('permisorol/show/{id}', 'PermisoRolController@show')->name('permiso.rol.show');
       Route::get('permisorol/delete/{id}', 'PermisoRolController@delete')->name('permiso.rol.delete');
       Route::get('permisorol/delete_confirm/{id}', 'PermisoRolController@delete_confirm')->name('permiso.rol.delete_confirm');


       Route::get('audits', 'AuditsController@index')->name('audits');

       /**MENU*/
      Route::get('menu', 'MenuController@index')->name('menu.list');     
      Route::get('menu/create', 'MenuController@create')->name('create_menu');
      Route::get('menu/edit/{id}', 'MenuController@edit')->name('edit_menu');
      Route::post('menu/update/{id}', 'MenuController@update')->name('update_menu');
      Route::post('menu', 'MenuController@store')->name('save_menu');
      Route::delete('menu/{id}/destroy', 'MenuController@destroy')->name('destroy_menu');
      Route::get('menu/show/{id}', 'MenuController@show')->name('menu.show');
      Route::get('menu/delete/{id}', 'MenuController@delete')->name('menu.delete');
      Route::get('menu/delete_confirm/{id}', 'MenuController@delete_confirm')->name('menu.delete_confirm');
     
     
      Route::post('menu-dinamico/guardarorden', 'MenuController@guardarOrden')->name('guardar_orden');

      Route::get('menu-dinamico', 'MenuController@menu_dinamico')->name('menu.dinamico');

      /*RUTAS MENU_ROL*/
      Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol.list');
      Route::post('menu-rol', 'MenuRolController@store')->name('guardar_menu_rol');
      
  });