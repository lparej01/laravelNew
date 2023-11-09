<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\User;
use App\Models\Admin\PermisoRol;
use App\Models\Admin\Permiso;
use Illuminate\Support\Facades\DB;
use Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consulta = Rol::Roles();

        $rols = serializeJson($consulta);
        
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

      
       // $array = array("can_query"=> 1, "can_insert"=>  $permiso_status[0]->status, "can_update"=>$permiso_status[2]->status,"can_delete"=>$permiso_status[1]->status,"can_assignment"=>$permiso_status[3]->status);    
        $array = array("can_create" => $permiso_status[0]->status, 
                        "can_edit" => $permiso_status[2]->status, 
                        "can_show" => $permiso_status[5]->status,
                        "can_disable" => $permiso_status[4]->status,
                        "can_delete" => $permiso_status[1]->status);    
       
        $actions = serializeJson($array);

        $us = User::getAllUsers();

        $users = serializeJson($us);
       // dd($users);        
     
        return view('admin.user.index', compact('users', 'actions'));  
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'names.regex' => 'El Nombre no debe contener caracteres especiales', 'names.min' => 'El Nombre  debe contener minimo  3 caracteres', 'names.max' => 'El nombre o los no debe tener maximo 20 caracteres',              
            'names.required'=> 'El Nombre debe ser requerido',
            'surnames.regex' => 'El Apellido no debe contener caracteres especiales', 'surnames.min' => 'El apellido debe contener 3 caracteres', 'surnames.max' => 'El apellido o los apellidos  debe contener maximo 20caracteres',              
            'surnames.required'=> 'El Apellido debe ser requerido',                         
            'username.required'=> 'El Nombre de usuario debe ser requerido', 'username.unique' => 'El nombre de usuario ya esta en uso',
            'email.required'=> 'El correo es requerido',
            'password.required'=> 'La contaraseña es requerido',
            'images.required'=> 'La Foto  es requerida',
            
        ];
        $request->validate([
            'names'      => ['required',  'min:3', 'max:20'],
            'surnames'   => ['required',  'min:3', 'max:20'],
            'username'  => ['required',  'unique:users', 'min:3', 'max:20'],
            'email'      => ['required', 'unique:users'],
            'password' => ['required',  'confirmed', 'min:8', 'max:12'],
            'password_confirmation' => ['required_with:password|same:password|min:8'],
            'images' => ['required'],      
            
        ], $messages); 
		
		if($request->file("images")){
   
		   
		 
		   $img = $request->file("images")->store('imagenes','public');
      

        }


        $idusuario= DB::table('users')
        ->insertGetId([           
            'names'  => ucfirst($request->names),  
            'surnames'  => ucfirst($request->surnames),  
            'username'  => $request->username,
            'email'  => $request->email,          
            'password' => bcrypt($request->password),
            'images'  =>$img, 
            'status' => true,            
            'created_at' => now(),
            'updated_at' => now()  
            
          
        ]); 
        
        DB::table('users_rol')->insert([
            'rol_id'  => 2,
            'usuario_id' => $idusuario,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now()                      
           
        ]); 
       
        return redirect()->route('user.list')->with('success', 'El Usuario se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);   
       
 
         return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::getUserId($id);      
        
       // dd($user); 
        return view('admin.user.edit', compact('user','id'));
          

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $messages = [
            'names.regex' => 'El campo no debe contener caracteres especiales', 'names.min' => 'El Código debe contener 3 caracteres', 'code.max' => 'El nombre del rol debe contener mas de 3 caracteres',              
            'names.required'=> 'El campo debe ser requerido',
            'surnames.regex' => 'El campo no debe contener caracteres especiales', 'surnames.min' => 'El Código debe contener 3 caracteres', 'code.max' => 'El nombre del rol debe contener mas de 3 caracteres',              
            'surnames.required'=> 'El campo debe ser requerido',                          
            'email.required'=> 'El campo debe ser requerido',           
            
        ];
        $request->validate([
            'names'           => ['required', 'regex:/^[A-Za-z\s]+$/', 'min:3', 'max:20'],
            'surnames'           => ['required', 'regex:/^[A-Za-z\s]+$/', 'min:3', 'max:20'],
            'email' => 'required|email|unique:users,email,'.$request->id,
            
        ], $messages);
                                
        if($request->file("images")){ 
		   
		 
            $img = $request->file("images")->store('imagenes','public');

            $Object = User::find($id);
            $Object ['names']  = ucfirst( $request->names); 
            $Object ['surnames']  = ucfirst( $request->surnames);  
            $Object ['surnames']  = ucfirst( $request->surnames);
            $Object ['status']  = $request->status;
            $Object ['email']  = $request->email; 
            $Object ['images']  = $img;
            
            $Object ->save();

 
         }else{

            $Object = User::find($id);
            $Object ['names']  = ucfirst( $request->names); 
            $Object ['surnames']  = ucfirst( $request->surnames);  
            $Object ['surnames']  = ucfirst( $request->surnames);
            $Object ['status']  = $request->status;
            $Object ['email']  = $request->email;
            
            
            $Object ->save();

         }
         

           


        return redirect()->route('user.list')->with('success', 'El usuario se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function disable(string $id)
    {
        $user = User::find($id); 
        
        return view('admin.user.disable', compact('user','id'));

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function disable_confirm(string $id)
    {
        $user = User::find($id); 
        
        if($user->status){
            $Object = User::find($id);           
            $Object ['status']  = false;           
            $Object ->update();

        }else{
            $Object = User::find($id);           
            $Object ['status']  = true;           
            $Object ->update();

        }      
       

        return redirect()->route('user.list')->with('success', 'El usuario se actualizo  su status correctamente');
    }
}
