<select name="descripcion" id="descripcion" class="form-select @error('descripcion') is-invalid @enderror" >
    <option value="">Seleccione la descripción</option>           
    @foreach ($tipo as $producto)
    <option value="{{ $producto->tipo }}">{{ $producto->tipo }}</option>
    @endforeach
</select>

