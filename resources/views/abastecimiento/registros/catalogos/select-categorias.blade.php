<select name="catId" id="catId" class="form-select @error('catId') is-invalid @enderror" >
    <option value="">Seleccione la categoria</option>           
    @foreach ($categorias as $sku)
    <option value="{{ $sku->catId }}">{{ $sku->categoria }}</option>
    @endforeach

</select>

