
   
         
                        <select name="permiso_id" id="" class="form-select @error('permiso_id') is-invalid @enderror" placeholder = "Seleccione el permiso">
                         
                                    <option value="">Seleccione el permiso</option>
                                     @foreach ($permisos as $perm)
                                    <option value="{{ $perm->id }}">{{ $perm->nombre }}</option>
                                    @endforeach

                       
                        </select>
                        @error('permiso_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  
     
