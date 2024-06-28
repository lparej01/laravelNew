<select name="descCombo" id="descCombo" onchange="combo()" class="form-select @error('descCombo') is-invalid @enderror" >
      <option value="">Seleccione el combo</option>           
      @if ( !isset($combos))
        <option value="">No Hay combo que iniciar</option>  
      @else
            @foreach ($combos as $item)           
            <option value="{{ $item->comboId }}">{{ $item->descCombo }}</option>   
            @endforeach
      @endif
   
   


</select>
<script>
    function combo() {                
                var comb = document.getElementById('descCombo').value;
                var comboid = document.getElementById('comboId').value;               

                if (comb > 1000000) {                  
                   
                    document.getElementById('comboId').value= comb;
                }                 
            
    }              


</script>