<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\UsersRol;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * El usuario ya esta autenticado
     * 
     * 
     */
    protected function authenticated(Request $request, $user)
    {
      

        $usuario_id= user()->id; 
        $rol = UsersRol::getUserRolId($usuario_id);
     
       
        if ($user->status  && $rol->estado == "Activo" ) {

            return redirect('home')->with(['success' => 'Ha iniciado sesión.']);

            
        } else {
           
            $this->guard()->logout();
            $request->session()->invalidate();    
            $request->session()->regenerateToken();
            return redirect('login')->with(['warning' => 'Usuario o rol inactivo consulte con el Administrador.']);
           
        }
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
