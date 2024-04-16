<div class="box box-info padding-1">
    <div class="box-body">
        <h4>Editar pedido</h4>
         
            <div class="col-lg-6">
                {{ Form::label('Pedido Nro.') }}
                {{ Form::text('Nombre del Pedido', $pedidos->pedidoId, ['class' => 'form-control' . ($errors->has('pedidoId') ? ' is-invalid' : ''),  "id" => "pedidoId","name" => "pedidoId",'readonly']) }}
                {!! $errors->first('pedidoId', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Fecha del Pedido') }}
                {{ Form::text('fechaPedido', $pedidos->fechaPedido, ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''),  "id" => "fechaPedido","name" => "fechaPedido",'readonly']) }}
                {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Proveedor') }}
                <select name="provId" id="provId" class="form-select @error('provId') is-invalid @enderror" >
                                 
                    <option value="{{ $pedidos->provId }}">{{ $pedidos->nombre }}</option>
                    @foreach ($provee as $prov)
                    <option value="{{ $prov->provId }}">{{ $prov->nombre }}</option>
                    @endforeach
                
                </select>
                {{-- {{ Form::text('nombre', $pedidos->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), "id" => "nombre","name" => "nombre",'readonly']) }} --}}
                {!! $errors->first('provId', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Catalogo ó Sku') }}

                <select name="sku" id="sku" class="form-select @error('sku') is-invalid @enderror" >
                                 
                    <option value="{{ $pedidos->sku }}" selected>{{ $pedidos->descripcion }}</option>
                    @foreach ($sku as $sk)
                    <option value="{{ $sk->sku }}">{{ $sk->descripcion }}</option>
                    @endforeach 
                
                </select>                
               {{--  {{ Form::text('marca', $pedidos->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), "id" => "marca","name" => "marca",'readonly']) }} --}}
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad') }}
                {{ Form::number('cant', old('cant',$pedidos->cant), ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''),"onblur"=> "obtenerCostoTotal()" , "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Costo Unitario') }}
                {{ Form::number('costoUnitario', $pedidos->costoUnitario, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario",'readonly']) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Costo Total') }}
                {{ Form::number('costoTotal', $pedidos->costoTotal, ['class' => 'form-control' . ($errors->has('costoTotal') ? ' is-invalid' : ''), "id" => "costoTotal","name" => "costoTotal",'readonly']) }}
                {!! $errors->first('costoTotal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Flete') }}
                {{ Form::number('flete', old('cant',$pedidos->flete), ['class' => 'form-control' . ($errors->has('flete') ? ' is-invalid' : ''), "id" => "flete","name" => "flete","onblur"=> "obtenerTotalFleteEdit()"]) }}
                {!! $errors->first('flete', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Total con Flete') }}
                {{ Form::text('costoTotalFlete', $pedidos->costoTotalFlete, ['class' => 'form-control' . ($errors->has('costoTotalFlete') ? ' is-invalid' : ''), "id" => "costoTotalFlete","name" => "costoTotalFlete",'readonly']) }}
                {!! $errors->first('costoTotalFlete', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            
        </div>
      </div>
  
           
</div>
<script>
    function obtenerCostoTotal ()
    {  
        var cant = document.getElementById('cant').value;
        var costoUnitario = document.getElementById('costoUnitario').value;
        
        if (cant == 0) {
            document.getElementById('cant').value =1;
            
        } else {
            const total = parseFloat(cant) * parseFloat(costoUnitario);  

            document.getElementById('costoTotal').value= total;
        
            
        }
        
        
        
         
     
        
    

    }
 

    function obtenerTotalFleteEdit ()
    {  
        var costoTotal = document.getElementById('costoTotal').value;
        var flete = document.getElementById('flete').value;
        
        const totaledit = parseFloat(costoTotal) + parseFloat(flete);  

        document.getElementById('costoTotalFlete').value= totaledit;
        
         
     
        
    

    }
 
</script>