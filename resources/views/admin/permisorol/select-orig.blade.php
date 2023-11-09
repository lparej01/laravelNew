               
  <select name="rol_id" id="" class="form-select @error('rol_id') is-invalid @enderror" placeholder = "Seleccionar Rol">
        <option value="">Seleccione el rol</option>                        
          @foreach ($roles as $rol)
           <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
           @endforeach
                          
  </select>
 @error('rol_id')
      <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
       </span>
 @enderror
                   
