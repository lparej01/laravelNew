<?php

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Admin\Rol;
use App\Models\Admin\UsersRol;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Menu extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   

    

    protected $table="menu";

    protected $guarded = ['id'];

    protected $fillable = ['nombre','url','icono','tipo'];

    public function roles(){
       
        return $this->belongsToMany(Rol::class, 'menu_rol');
     }
     
     public function getHijos($padres, $line)
     {
         $children = [];
         foreach ($padres as $line1) {
             if ($line['id'] == $line1['menu_id']) {
                 $children = array_merge($children, [array_merge($line1, ['submenu' => $this->getHijos($padres, $line1)])]);
             }
         }
         return $children;
     }
     public function getPadres($front)
     {
        if ($front) {
             return $this->whereHas('roles', function ($query) {
                $usuario_id= user()->id; 
                $user = UsersRol::getUserRolId($usuario_id);


                 $query->where('rol_id', $user->rol_id)->orderby('menu_id');
             })->orderby('menu_id')
                 ->orderby('orden')
                 ->get()
                 ->toArray();
         } else {
             return $this->orderby('menu_id')
                 ->orderby('orden')
                 ->get()
                 ->toArray();
         }
     }
     public static function getMenu($front = false)
     {
         $menus = new Menu();
         $padres = $menus->getPadres($front);
         $menuAll = [];
         foreach ($padres as $line) {
             if ($line['menu_id'] != 0)
                 break;
             $item = [array_merge($line, ['submenu' => $menus->getHijos($padres, $line)])];

            
             $menuAll = array_merge($menuAll, $item);

            
         }
      //   dd($menuAll);
         return $menuAll;
     }
     public function guardarOrden($menu)
     {
         $menus = json_decode($menu);
         foreach ($menus as $var => $value) {
             $this->where('id', $value->id)->update(['menu_id' => 0, 'orden' => $var + 1]);
             if (!empty($value->children)) {
                 foreach ($value->children as $key => $vchild) {
                     $update_id = $vchild->id;
                     $parent_id = $value->id;
                     $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);
 
                     if (!empty($vchild->children)) {
                         foreach ($vchild->children as $key => $vchild1) {
                             $update_id = $vchild1->id;
                             $parent_id = $vchild->id;
                             $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);
 
                             if (!empty($vchild1->children)) {
                                 foreach ($vchild1->children as $key => $vchild2) {
                                     $update_id = $vchild2->id;
                                     $parent_id = $vchild1->id;
                                     $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);
 
                                     if (!empty($vchild2->children)) {
                                         foreach ($vchild2->children as $key => $vchild3) {
                                             $update_id = $vchild3->id;
                                             $parent_id = $vchild2->id;
                                             $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);
                                         }
                                     }
                                 }
                             }
                         }
                     }
                 }
             }
         }

       
     }

     public function obtPadres($front=false)
     {
        if ($front) {
             return $this->whereHas('roles', function ($query) {
                $usuario_id= user()->id; 
                $user = UsersRol::getUserRolId($usuario_id);


                 $query->where('rol_id', $user->rol_id)->orderby('menu_id');
             })->orderby('menu_id')
                 ->orderby('orden')
                 ->get()
                 ->toArray();
         } else {
             return $this->orderby('menu_id')
                 ->orderby('orden')
                 ->get()
                 ->toArray();
         }
     }
     public static function obtMenuId($id){
        
       return DB::table('menu')->where('id',$id)->first();
     }

}
