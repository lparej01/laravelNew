<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

   // use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


     public function resetPassword()
    {
      
        return view('auth.passwords.reset');
    } 

    public function sendemail()   {
       

        return view('auth.passwords.email');
    }

    public function reset(Request $request){
       
      
       $user=User::getEmail($request->email); 

       if ($user->status === true) {

            $Object = User::find($user->id);
            $Object ['password']  = bcrypt($request->password);           
            $Object ->save();

            return redirect()->route('login')->with('success', 'Actualización realizada exitosamente');
       
       } else {

           return redirect()->route('login')->with('warning', 'Error en el cambio de contraseña');
        
       }
       

       
        
    }


}
