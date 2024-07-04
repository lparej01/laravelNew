<div class="box box-info padding-1">
    <div class="box-body">
          
            <div class="col-lg-6">
                {{ Form::label('Tipo de movimiento de inventario') }}
                <select name="tipoMovinv" id="tipoMovinv" class="form-select @error('tipoMovinv') is-invalid @enderror" >
                    <option value="">Seleccione el tipo de movimiento</option>
                     <option value="Recepcion">Recepción</option> 
                     <option value="Despacho">Despacho</option> 
                     <option value="Devolucion">Devolución</option> 
                     <option value="Retorno">Retorno</option> 
                
                </select>
                {!! $errors->first('tipoMovinv', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Número de pedido') }}
                {{ Form::number('pedidoId', $movinv->pedidoId, ['class' => 'form-control' . ($errors->has('pedidoId') ? ' is-invalid' : ''),  "id" => "pedidoId","name" => "pedidoId","onKeyPress"=> "if(this.value.length==12) return false;",'readonly']) }}
                {!! $errors->first('pedidoId', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Sku') }}
                {{ Form::number('sku', $movinv->sku, ['class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''), "id" => "sku","name" => "sku", "onKeyPress"=> "if(this.value.length==12) return false;",'readonly']) }}
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Fecha del pedido') }}
                {{ Form::text('fechaPedido', $movinv->fechaPedido, ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''), "id" => "fechaPedido","name" => "fechaPedido",'readonly']) }}
                {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad') }}
                {{ Form::number('cant', $movinv->cant, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad pendiente') }}
                {{ Form::number('cantPendiente', $movinv->cantPendiente, ['class' => 'form-control' . ($errors->has('cantPendiente') ? ' is-invalid' : ''), "id" => "cantPendiente","name" => "cantPendiente",'readonly']) }}
                {!! $errors->first('cantPendiente', '<div class="invalid-feedback">:message</div>') !!}
            </div>
          
            
           
             
           
          
        </div>
      </div>
    </div>
</div>