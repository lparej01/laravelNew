<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Servicios\SoporteTecnico\SoporteTecnico;
use App\Models\Servicios\SoporteTecnico\Departamentos;
use App\Models\Servicios\SoporteTecnico\Incidencias;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){       
       
        
        return view('start');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with(['success' => 'Te has desconectado.']);
    }
}
