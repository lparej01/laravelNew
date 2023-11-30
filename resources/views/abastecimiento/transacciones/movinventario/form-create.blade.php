<div class="box box-info padding-1">
    <div class="box-body">
        @csrf
          
            <div class="col-lg-6">
             
                <label>Tipo de movimiento (*)</label>
                <select name="tipoMovinv" id="tipoMovinv" class="form-select @error('tipoMovinv') is-invalid @enderror" >
                    <option value="0" selected='selected'>Seleccione el tipo de movimiento</option>
                     <option value="Recepcion" >Recepcion</option> 
                     <option value="Despacho" >Despacho</option> 
                     <option value="Devolucion" >Devolucion</option> 
                     <option value="Retorno" >Retorno</option> 
                
                </select>
                {!! $errors->first('tipoMovinv', '<div class="invalid-feedback">:message</div>') !!} 
            </div> 
            <br>
            <div class="col-lg-6">
                
                <label >Sku o Catalogo (*)</label>
                <select name="sku" id="sku" class="form-select @error('sku') is-invalid @enderror" onchange="obtenerPedidos()">
                    <option value="0">Seleccione el sku </option>
                    @foreach ($movsku as $sku)
                    <option value="{{ $sku->sku }}">{{ $sku->descripcion }}</option>
                    @endforeach
                
                </select>
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div>
           
            <br> 
            <div class="col-lg-6">
                
                <label >Fecha Movimiento</label>
                {{ Form::date('fechaMovinv', null, ['class' => 'form-control' . ($errors->has('fechaMovinv') ? ' is-invalid' : ''), "id" => "fechaMovinv","name" => "fechaMovinv", "onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('fechaMovinv', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
               
                <label >Cantidad</label>
                {{ Form::number('cant', null, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
          
          
        </div>
      </div>
    </div>
    <script src="{{asset("assets/team/scripts/tables/abastecimiento/transacciones/movInv.js")}}"></script>
</div>
<!-- Modal -->
<div class="modal fade" id="pedidoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedidos por Sku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
           
           
            

          @if (empty($buscarSku))

                @foreach ($buscarSku as $item)

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    $item->pedidoId
                    <label class="form-check-label" for="flexRadioDefault1">
                    
                    </label>
                  </div>
    
                @endforeach
               
            
               
           @else

                 <div class="form-check">
                    <label for="">No hay datos</label>
                    </label>
                  </div>
               
           @endif
                
                    
                
         
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

