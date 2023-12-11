<div class="box box-info padding-1">
    <div class="box-body">
          
           {{--  <div class="col-lg-6">
                {{ Form::label('Nombre del pedido') }}
                {{ Form::text('Nombre del Pedido', $pedidos->pedidoId, ['class' => 'form-control' . ($errors->has('pedidoId') ? ' is-invalid' : ''),  "id" => "pedidoId","name" => "pedidoId",'readonly']) }}
                {!! $errors->first('pedidoId', '<div class="invalid-feedback">:message</div>') !!}
            </div>  --}}
            <div class="col-lg-6">
                {{ Form::label('Fecha del Pedido (*)') }}
                {{ Form::date('fechaPedido', '19/01/01', ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''),  "id" => "fechaPedido","name" => "fechaPedido"]) }}
                {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Proveedor (*)') }}
                <select name="provId" id="provId" class="form-select @error('provId') is-invalid @enderror" >
                    <option value="">Seleccione  el proveedor</option>                 
                    
                    @foreach ($proveedor as $prov)
                    <option value="{{ $prov->provId }}">{{ $prov->nombre }}</option>
                    @endforeach
                
                </select>
               
                {!! $errors->first('provId', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Catalogo  o SKU (*)') }}
                <select name="sku" id="sku" class="form-select @error('sku') is-invalid @enderror" >
                    <option value="">Seleccione  el Catálogo</option>                 
                    
                    @foreach ($sku as $sk)
                    <option value="{{ $sk->sku }}">{{ $sk->descripcion }}</option>
                    @endforeach
                
                </select>
             
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad (*)') }}
                {{ Form::number('cant', null, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;", 'placeholder' => 'Ingrese la cantidad']) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 

            <div class="col-lg-6">
                {{ Form::label('Costo Unitario (*)') }}
                {{ Form::number('costoUnitario', null, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario","onKeyPress"=> "if(this.value.length==12) return false;", 'placeholder' => 'Ingrese el costo unitario']) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Costo Total') }}
                {{ Form::number('costoTotal', null, ['class' => 'form-control' . ($errors->has('costoTotal') ? ' is-invalid' : ''), "id" => "costoTotal","name" => "costoTotal","onKeyPress"=> "if(this.value.length==12) return false;",'readonly', 'placeholder' => 'Costo Total']) }}
                {!! $errors->first('costoTotal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Flete (*)') }}
                {{ Form::number('flete', null, ['class' => 'form-control' . ($errors->has('flete') ? ' is-invalid' : ''), "id" => "flete","name" => "flete","onKeyPress"=> "if(this.value.length==12) return false;", 'placeholder' => 'Flete del Producto']) }}
                {!! $errors->first('flete', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            <div class="col-lg-6">
                {{ Form::label('Total con Flete') }}
                {{ Form::number('costoTotalFlete', null, ['class' => 'form-control' . ($errors->has('costoTotalFlete') ? ' is-invalid' : ''), "id" => "costoTotalFlete","name" => "costoTotalFlete","onKeyPress"=> "if(this.value.length==12) return false;",'readonly', 'placeholder' => 'Costo total flete']) }}
                {!! $errors->first('costoTotalFlete', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            
          
        </div>
      </div>
    </div>
</div>