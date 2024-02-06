<div class="box box-info padding-1">
    <div class="box-body">  
      <h4>Entrada o Salida Movimiento de Inventario</h4>
      <br>     
        <div class="row">
          <div class=" form-group col-6">
            <label>Tipo de movimiento (*)</label>
            <select name="tipoMovinv" id="tipoMovinv" class="form-select @error('tipoMovinv') is-invalid @enderror" >
                <option value="0" selected='selected'>Seleccione el tipo de movimiento</option>
                 <option value="Recepcion" >Recepcion</option> 
                 <option value="Despacho" >Despacho</option> 
               {{--   <option value="Devolucion" >Devolucion</option> 
                 <option value="Retorno" >Retorno</option>  --}}
            
            </select>
            {!! $errors->first('tipoMovinv', '<div class="invalid-feedback">:message</div>') !!} 
          </div>
          <div class=" form-group col-6">
            <label >Sku o Catalogo (*)</label>
            <select name="selectsku" id="selectsku" class="form-select @error('selectsku') is-invalid @enderror" onchange="obtenerPedidos()">
                <option value="0">Seleccione el sku </option>
                @foreach ($movsku as $sku)
                <option value="{{ $sku->sku }}">{{ $sku->descripcion }}</option>
                @endforeach
            
            </select>
            {!! $errors->first('selectsku', '<div class="invalid-feedback">:message</div>') !!}
          </div>          
      </div>         
            <br>           
            
            <div class="col-lg-6">
             
              <label >Pedidos Relacionados (*)</label>
              <select name="ped" id="ped" class="form-select @error('ped') is-invalid @enderror" >
                  
                {{--   @if (!empty($pedido))
                      @foreach ($pedido as $ped)
                      <option value="{{ $ped->pedidoId }}">{{ $ped->pedidoId }}</option>
                      @endforeach
                
                   @else
                      <option value="0">No hay ningun registro </option>
                  @endif  --}}
              </select>
              
          </div>           
            <div class="col-lg-6">
               
              <label >Sku</label>
             

                @if (!empty($pedido[0]->sku))
              
                {{ Form::text('sku', $pedido[0]->sku, ['class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''), "id" => "sku","name" => "sku",'readonly']) }}
                @else
                {{ Form::text('sku', null, ['class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''), "id" => "sku","name" => "sku",'readonly']) }} 
                @endif
             
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
                {{ Form::number('sku', null, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
          
          
        </div>
      </div>
    </div>
   
    <script src="{{asset("assets/team/scripts/tables/abastecimiento/transacciones/movInv.js")}}"></script>