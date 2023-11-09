<select name="unidadMedida" id="unidadMedida" class="form-select @error('unidadMedida') is-invalid @enderror" >
    <option value="0">Seleccione la categoria</option>
    <option value="{{ $catalogos->catId }}" selected='selected'>{{ $catalogos->categoria }}</option> 
    
    @foreach ($exc as $sku)
    <option value="{{ $sku->catId }}">{{ $sku->categoria }}</option>
    @endforeach

</select>