<div class="d-flex flex-column gap-4  p-3 m-3">   
                  <div class="d-flex justify-content-between">
                    <strong>Indentificador:</strong>
                    {{ $permiso_rol->id }}
                </div>
              
               
                 <div class="d-flex justify-content-between">
                    <strong>Nombre de Rol:</strong>
                    {{ $permiso_rol->rol }}
                </div>
                 <div class="d-flex justify-content-between">
                    <strong>Nombre de permiso:</strong>
                    {{ $permiso_rol->permiso }}
                </div>

                 <div class="d-flex justify-content-between">
                    <strong>Estado:</strong>
                    {{ $permiso_rol->estado }}
                </div>

           
</div>