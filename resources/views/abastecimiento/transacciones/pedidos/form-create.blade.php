<div class="box box-info padding-1">
    <div class="box-body">
          
        
            <div class="col-lg-6">
                {{ Form::label('Fecha del Pedido (*)') }}
                {{ Form::text('fechaPedido', date(" Y-m-d "), ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''),  "id" => "fechaPedido","name" => "fechaPedido",'readonly']) }}
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
                {{ Form::number('costoUnitario', old('costoUnitario'), ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario","onKeyPress"=> "if(this.value.length==6) return false;","onblur"=> "obtenerPedidosCosto()",  'placeholder' => 'Ingrese el costo unitario']) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Costo Total') }}
                {{ Form::number('costoTotal', old('costoTotal'), ['class' => 'form-control' . ($errors->has('costoTotal') ? ' is-invalid' : ''), "id" => "costoTotal","name" => "costoTotal","onKeyPress"=> "if(this.value.length==12) return false;",'readonly', 'placeholder' => 'Costo Total']) }}
                {!! $errors->first('costoTotal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Flete (*)') }}
                {{ Form::number('flete', old('flete'), ['class' => 'form-control' . ($errors->has('flete') ? ' is-invalid' : ''), "id" => "flete","name" => "flete","onKeyPress"=> "if(this.value.length==12) return false;","onblur"=> "obtenerTotalFlete()", 'placeholder' => 'Flete del Producto']) }}
                {!! $errors->first('flete', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            <div class="col-lg-6">
                {{ Form::label('Total con Flete') }}
                {{ Form::number('costoTotalFlete', old('costoTotalFlete'), ['class' => 'form-control' . ($errors->has('costoTotalFlete') ? ' is-invalid' : ''), "id" => "costoTotalFlete","name" => "costoTotalFlete","onKeyPress"=> "if(this.value.length==12) return false;",'readonly', 'placeholder' => 'Costo total flete']) }}
                {!! $errors->first('costoTotalFlete', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            
           
          <script src="{{asset("assets/team/scripts/tables/abastecimiento/transacciones/pedido_costo.js")}}"></script>
        </div>
      </div>
    </div>
</div>
