<select name="descripcion" id="descripcion" class="form-select @error('tipo') is-invalid @enderror" >
    <option value=" ">Seleccione la descripcion</option>
    <option value="{{ $catalogos->descripcion }}" selected='selected'>{{ $catalogos->descripcion }}</option>  
    
    @foreach ($exc as $sku)
    <option value="{{ $sku->descripcion }}">{{ $sku->descripcion }}</option>
    @endforeach

</select>