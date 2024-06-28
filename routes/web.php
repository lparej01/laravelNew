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
Route::group(['prefix' => 'abastecimiento', 'namespace' => 'App\Http\Controllers\SistemaAbastecimiento', 'middleware' => ['auth']], function () {
    
  /*RUTAS DE PROVEEDORES*/
  Route::get('proveedores', 'ProveedoresController@index')->name('proveedores.list');    
  Route::get('proveedores/edit/{id}', 'ProveedoresController@edit')->name('edit.proveedores');
  Route::post('proveedores/{id}', 'ProveedoresController@update')->name('update.proveedores');
  Route::delete('proveedores/{id}/destroy', 'ProveedoresController@destroy')->name('destroy.proveedores');
  Route::get('proveedores/show/{id}', 'ProveedoresController@show')->name('proveedores.show'); 
  Route::get('proveedores/disable/{id}', 'ProveedoresController@disable')->name('proveedores.disable'); 
  Route::get('proveedores/disable_confirm/{id}', 'ProveedoresController@disable_confirm')->name('proveedores.disable_confirm');
  Route::get('proveedores/create', 'ProveedoresController@create')->name('crear.proveedores');
  Route::post('proveedores', 'ProveedoresController@store')->name('save.proveedores');

  ///*Pedidos////
   Route::get('pedidos', 'PedidosController@index')->name('pedidos.list');    
   Route::get('pedidos/edit/{id}', 'PedidosController@edit')->name('edit.pedidos');
   Route::post('pedidos/{id}', 'PedidosController@update')->name('update.pedidos');
   Route::delete('pedidos/{id}/destroy', 'PedidosController@destroy')->name('destroy.pedidos');
   Route::get('pedidos/show/{id}', 'PedidosController@show')->name('pedidos.show'); 
   Route::get('pedidos/disable/{id}', 'PedidosController@disable')->name('pedidos.disable'); 
   Route::get('pedidos/disable_confirm/{id}', 'PedidosController@disable_confirm')->name('pedidos.disable_confirm');
   Route::get('pedidos/create', 'PedidosController@create')->name('crear.pedidos');
   Route::post('pedidos', 'PedidosController@store')->name('save.pedidos');
   Route::get('pedidos/costtotal', 'PedidosController@costtotal');
   Route::get('pedidos/totalflete', 'PedidosController@totalflete');
   Route::get('total_edit', 'PedidosController@totaledit');

  
   
   ///*Despachos////
    Route::get('despachos', 'DespachosController@index')->name('despachos.list');    
    Route::get('despachos/edit/{id}', 'DespachosController@edit')->name('edit.despachos');
    Route::post('despachos/{id}', 'DespachosController@update')->name('update.despachos');
    Route::delete('despachos/{id}/destroy', 'DespachosController@destroy')->name('destroy.despachos');
    Route::get('despachos/show/{id}', 'DespachosController@show')->name('despachos.show'); 
    Route::get('despachos/disable/{id}', 'DespachosController@disable')->name('despachos.disable'); 
    Route::get('despachos/disable_confirm/{id}', 'DespachosController@disable_confirm')->name('despachos.disable_confirm');
    Route::get('despachos/create', 'DespachosController@create')->name('crear.despachos');
    Route::post('despachos', 'DespachosController@store')->name('save.despachos'); 

  ///*Sku////catalogos
  Route::get('catalogos', 'SkuController@index')->name('catalogos.list');    
  Route::get('catalogos/edit/{id}', 'SkuController@edit')->name('edit.catalogos');
  Route::post('catalogos/{id}', 'SkuController@update')->name('update.catalogos');
  Route::delete('catalogos/{id}/destroy', 'SkuController@destroy')->name('destroy.catalogos');
  Route::get('catalogos/show/{id}', 'SkuController@show')->name('catalogos.show'); 
  Route::get('catalogos/disable/{id}', 'SkuController@disable')->name('catalogos.disable'); 
  Route::get('catalogos/disable_confirm/{id}', 'SkuController@disable_confirm')->name('catalogos.disable_confirm');
  Route::get('catalogos/create', 'SkuController@create')->name('crear.catalogos');
  Route::post('catalogos', 'SkuController@store')->name('save.catalogos');

 ///*Productos////
 Route::get('productos', 'ProductosController@index')->name('productos.list');    
 Route::get('productos/edit/{id}', 'ProductosController@edit')->name('edit.productos');
 Route::post('productos/{id}', 'ProductosController@update')->name('update.productos');
 Route::get('productos/delete/{id}', 'ProductosController@delete')->name('productos.delete');
 Route::get('productos/delete_confirm/{id}', 'ProductosController@delete_confirm')->name('productos.delete_confirm');
 Route::get('productos/show/{id}', 'ProductosController@show')->name('productos.show'); 
 Route::get('productos/disable/{id}', 'ProductosController@disable')->name('productos.disable'); 
 Route::get('productos/disable_confirm/{id}', 'ProductosController@disable_confirm')->name('productos.disable_confirm');
 Route::get('productos/create', 'ProductosController@create')->name('crear.productos');
 Route::post('productos', 'ProductosController@store')->name('save.productos');

 ///*Planes Produccion////
 Route::get('planes-produccion', 'PlanesProduccionController@index')->name('planes-produccion.list');  
 //::get('planes-reporta-produccion/show-reporte/{planid}', 'PlanesProduccionController@reporteproduccion')->name('planes-reporta-produccion.show');      
 Route::get('planes-produccion/edit/{id}', 'PlanesProduccionController@edit')->name('edit.planes-produccion-reporte');
 Route::post('planes-produccion/{id}', 'PlanesProduccionController@update')->name('update.planes-produccion');
 Route::get('planes-produccion/delete/{id}', 'PlanesProduccionController@delete')->name('delete.planes-produccion');
 Route::get('planes-produccion/show/{id}', 'PlanesProduccionController@show')->name('planes-produccion.show'); 
 Route::get('planes-produccion/disable/{id}', 'PlanesProduccionController@disable')->name('planes-produccion.disable'); 
 Route::get('planes-produccion/delete_confirm/{id}', 'PlanesProduccionController@delete_confirm')->name('planes-produccion.delete_confirm');
 Route::get('planes-produccion/create', 'PlanesProduccionController@create')->name('crear.planes-produccion');
 Route::post('planes-produccion', 'PlanesProduccionController@store')->name('save.planes-produccion');
 Route::get('planes-strequisicion', 'PlanesProduccionController@strequisicion')->name('save.planes-strequisicion');

///*Planes Entrega////
Route::get('planes-entrega', 'PlanesEntregaController@index')->name('planes-entrega.list');    
Route::get('planes-entrega/edit/{id}', 'PlanesEntregaController@edit')->name('edit.planes-entrega');
Route::post('planes-entrega/{id}', 'PlanesEntregaController@update')->name('update.planes-entrega');
Route::delete('planes-entrega/{id}/destroy', 'PlanesEntregaController@destroy')->name('destroy.planes-entrega');
Route::get('planes-entrega/show/{id}', 'PlanesEntregaController@show')->name('planes-entrega.show'); 
Route::get('planes-entrega/delete/{id}', 'PlanesEntregaController@delete')->name('delete.planes-entrega'); 
Route::get('planes-entrega/disable_confirm/{id}', 'PlanesEntregaController@delete_confirm')->name('planes-entrega.delete_confirm');
Route::get('planes-entrega/create', 'PlanesEntregaController@create')->name('crear.planes-entrega');
Route::post('planes-entrega', 'PlanesEntregaController@store')->name('save.planes-entrega');


 ///*Periodo////
 Route::get('periodo', 'PeriodoController@index')->name('periodo.list');    
 Route::get('periodo/edit/{id}', 'PeriodoController@edit')->name('edit.periodo');
 Route::get('periodo/abrir/{id}', 'PeriodoController@abrirPeriodo')->name('abrir.periodo');
 Route::get('periodo/cerrar/{id}', 'PeriodoController@cerrarPeriodo')->name('cerrar.periodo');
 Route::get('periodo/generar', 'PeriodoController@generar_periodo')->name('generar.periodo');
 Route::post('periodo/{id}', 'PeriodoController@update')->name('update.periodo');
 Route::delete('periodo/{id}/destroy', 'PeriodoController@destroy')->name('destroy.periodo');
 Route::get('periodo/show/{id}', 'PeriodoController@show')->name('periodo.show'); 
 Route::get('periodo/disable/{id}', 'PeriodoController@disable')->name('periodo.disable'); 
 Route::get('periodo/disable_confirm/{id}', 'PeriodoController@disable_confirm')->name('periodo.disable_confirm');
 Route::get('periodo/create', 'PeriodoController@create')->name('crear.periodo');
 Route::post('periodo', 'PeriodoController@store')->name('save.periodo');

  ///*MovTer////
  Route::get('movter', 'MovTerController@index')->name('movter.list');    
  Route::get('movter/edit/{id}', 'MovTerController@edit')->name('edit.movter');
  Route::post('movter/{id}', 'MovTerController@update')->name('update.movter');
  Route::delete('movter/{id}/destroy', 'MovTerController@destroy')->name('destroy.movter');
  Route::get('movter/show/{id}', 'MovTerController@show')->name('movter.show'); 
  Route::get('movter/disable/{id}', 'MovTerController@disable')->name('movter.disable'); 
  Route::get('movter/disable_confirm/{id}', 'MovTerController@disable_confirm')->name('movter.disable_confirm');
  Route::get('movter/create', 'MovTerController@create')->name('crear.movter');
  Route::post('movter', 'MovTerController@store')->name('save.movter');

  ///*MovInv////
  Route::get('movinv', 'MovInvController@index')->name('movinv.list');    
  Route::get('movinv/edit/{id}', 'MovInvController@edit')->name('edit.movinv'); 
  Route::delete('movinv/{id}/destroy', 'MovInvController@destroy')->name('destroy.movinv');
  Route::get('movinv/show/{id}', 'MovInvController@show')->name('movinv.show');  
  Route::get('movinv/disable/{id}', 'MovInvController@disable')->name('movinv.disable'); 
  Route::get('movinv/disable_confirm/{id}', 'MovInvController@disable_confirm')->name('movinv.disable_confirm');  
  Route::post('movinv', 'MovInvController@store')->name('save.movinv');
  Route::get('movinv/agregar', 'MovInvController@agregarMovInv')->name('obtener_pedidos.movinv');
  //Route::post('movinv/{id}', 'MovInvController@update')->name('update.movinv');
  Route::get('movinv/entrada_salida', 'MovInvController@showPedido')->name('movinv.show_agregar');
  Route::get('movinv/buscar/pedido', 'MovInvController@buscarPedido')->name('movinv.buscar');    

    ///*Combos////
    Route::get('combos', 'CombosController@index')->name('combos.list');    
    Route::get('combos/edit/{id}', 'CombosController@edit')->name('edit.combos');
    Route::post('combos/{id}', 'CombosController@update')->name('update.combos');
    Route::get('combos/delete/{id}', 'CombosController@delete')->name('delete.combos');
    Route::get('combos/confirm_delete/{id}', 'CombosController@confirm_delete')->name('confirm_delete.combos');
    Route::get('combos/show/{id}', 'CombosController@show')->name('combos.show'); 
    Route::get('combos/assignment/{id}', 'CombosController@assignment')->name('combos.assignment'); 
    Route::post('combos/assignment/save', 'CombosController@assignmentsave')->name('combos.assignment-save'); 
    Route::get('combos/disable_confirm/{id}', 'CombosController@disable_confirm')->name('combos.disable_confirm');
    Route::get('combos/create', 'CombosController@create')->name('crear.combos');
    Route::post('combos', 'CombosController@store')->name('save.combos');

    ///*Categorias////
    Route::get('categorias', 'CategoriasController@index')->name('categorias.list');    
    Route::get('categorias/edit/{id}', 'CategoriasController@edit')->name('edit.categorias');
    Route::post('categorias/{id}', 'CategoriasController@update')->name('update.categorias');
    Route::delete('categorias/{id}/destroy', 'CategoriasController@destroy')->name('destroy.categorias');
    Route::get('categorias/show/{id}', 'CategoriasController@show')->name('categorias.show'); 
    Route::get('categorias/disable/{id}', 'CategoriasController@disable')->name('categorias.disable'); 
    Route::get('categorias/disable_confirm/{id}', 'CategoriasController@disable_confirm')->name('categorias.disable_confirm');
    Route::get('categorias/create', 'CategoriasController@create')->name('crear.categorias');
    Route::post('categorias', 'CategoriasController@store')->name('save.categorias');

    ///*CombosCategorias////
    Route::get('comboscategorias', 'CombosCategoriasController@index')->name('comboscategorias.list');    
    Route::get('comboscategorias/edit/{id}', 'CombosCategoriasController@edit')->name('edit.comboscategorias');
    Route::post('comboscategorias/{id}', 'CombosCategoriasController@update')->name('update.comboscategorias');
    Route::delete('comboscategorias/{id}/destroy', 'CombosCategoriasController@destroy')->name('destroy.comboscategorias');
    Route::get('comboscategorias/show/{id}', 'CombosCategoriasController@show')->name('comboscategorias.show'); 
    Route::get('comboscategorias/disable/{id}', 'CombosCategoriasController@disable')->name('comboscategorias.disable'); 
    Route::get('comboscategorias/disable_confirm/{id}', 'CombosCategoriasController@disable_confirm')->name('comboscategorias.disable_confirm');
    Route::get('comboscategorias/create', 'CombosCategoriasController@create')->name('crear.comboscategorias');
    Route::post('comboscategorias', 'CombosCategoriasController@store')->name('save.comboscategorias');


    ///*Existencia////
    Route::get('existencia', 'ExistenciaController@index')->name('existencia.list');    
    Route::get('existencia/edit/{id}/{periodo}', 'ExistenciaController@edit')->name('edit.existencia');
    Route::post('existencia/{id}', 'ExistenciaController@update')->name('update.existencia');
    Route::delete('existencia/{id}/destroy', 'ExistenciaController@destroy')->name('destroy.existencia');
    Route::get('existencia/show/{id}/{periodo}', 'ExistenciaController@show')->name('existencia.show'); 
    Route::get('existencia/disable/{id}', 'ExistenciaController@disable')->name('existencia.disable'); 
    Route::get('existencia/disable_confirm/{id}', 'ExistenciaController@disable_confirm')->name('existencia.disable_confirm');
    Route::get('existencia/create', 'ExistenciaController@create')->name('crear.existencia');
    Route::post('existencia', 'ExistenciaController@store')->name('save.existencia');


    Route::get('solicitud_despacho', 'SolicitudDespachoController@index')->name('solicitudDespacho.list');    

  
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