<div class="d-flex flex-column gap-4  p-3 m-3">   
                  <div class="d-flex justify-content-between">
                    <strong>Indentificador:</strong>
                    {{ $usersrol->id }}
                </div>
              
               
                 <div class="d-flex justify-content-between">
                    <strong>Nombre de Rol:</strong>
                    {{ $usersrol->nombre }}
                </div>
                 <div class="d-flex justify-content-between">
                    <strong>Nombre del usuario:</strong>
                    {{ $usersrol->username }}
                </div>

                 <div class="d-flex justify-content-between">
                    <strong>Estado:</strong>
                    {{ $usersrol->estado }}
                </div>

           
</div>