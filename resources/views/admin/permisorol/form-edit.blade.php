<div class="box box-info padding-1">
    <div class="box-body">
        {{ Form::label('Cambie el estado del permiso') }}
        <select style="width: 250px" name="status" id="status" class="form-select @error('permiso_rol.status') is-invalid @enderror" placeholder = "Seleccionar el estado">
                             
        @if ($permiso_rol->status == "Activo")
           <option value="1">Activo</option>
           <option value="0">Inactivo</option>
        @else
           <option value="0">Inactivo</option>
           <option value="1">Activo</option>
         @endif                 
       </select>
        @error('permiso_rol.id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
       @enderror      
                   
            <div class="col-lg-6">
               
                {{ Form::hidden('id', $permiso_rol->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),"id" => "id"]) }}
                
            </div>
            
           
        </div>
      </div>
    </div>
</div>
