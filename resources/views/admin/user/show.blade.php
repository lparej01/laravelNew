<div class="d-flex flex-column gap-4  p-3 m-3">
   
        <div class="d-flex justify-content-between">
            <strong>Indentificador:</strong>
            {{ $user->id }}
        </div>
        <div class="d-flex justify-content-between">
            <strong>Nombre de Usuario:</strong>
            {{ $user->username }}
        </div>
         <div class="d-flex justify-content-between">
            <strong>Nombres:</strong>
            {{ $user->names }}
        </div>
         <div class="d-flex justify-content-between">
            <strong>Apellidos:</strong>
            {{ $user->surnames }}
        </div>
         <div class="d-flex justify-content-between">
            <strong>Correo:</strong>
            {{ $user->email }}
        </div>
         <div class="d-flex justify-content-between">
            <strong>Imagen:</strong>
           @if ($user->images ==null)
              <h3>No tiene foto</h3>                                     
           @endif
            @if ($user->images != null)
              <img id="imagen" src ="{{ asset('storage').'/'.$user->images}}"  class="rounded" width="150" height="120" >                           
           @endif


          

        
        </div>