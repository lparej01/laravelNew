<div class="box box-info padding-1">
    <div class="box-body">

        <select name="estado" id="estado" class="form-select @error('usersrol.estado') is-invalid @enderror" placeholder = "Seleccionar el estado">
                             
        @if ($usersrol->estado == "Activo")
           <option value="true">Activo</option>
           <option value="false">Inactivo</option>
        @else
           <option value="false">Inactivo</option>
           <option value="true">Activo</option>
         @endif                 
       </select>
        @error('usersrol.id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
       @enderror      
                   
            <div class="col-lg-6">
               
                {{ Form::hidden('id', $usersrol->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),"id" => "id"]) }}
                
            </div>
            
           
        </div>
      </div>
    </div>
</div>