<div class="d-flex flex-column gap-4  p-3 m-3">
   
        <div class="d-flex justify-content-between">
            <strong>Indentificador:</strong>
            {{ $menu->id }}
        </div>
        <div class="d-flex justify-content-between">
            <strong>Titulo del menu:</strong>
            {{ $menu->nombre }}
        </div>
         <div class="d-flex justify-content-between">
            <strong>Url:</strong>
            {{ $menu->url }}
        </div>
         <div class="d-flex justify-content-between">
            <strong>Icono:</strong>

           <img id="imagen" src ="{{ asset('storage').'/'.$menu->icono}}"  class="rounded" width="150" height="120" >

            
           
              
          
        
        </div>
        
        
        
    
</div>
