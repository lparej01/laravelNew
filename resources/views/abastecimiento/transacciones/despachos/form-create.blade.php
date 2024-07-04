<div class="box box-info padding-1">
    <div class="box-body">          
        
            <div class="col-lg-6">
                {{ Form::label('Fecha de la solicitud (*)') }}
                {{ Form::date('fechaPedido', null, ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''),  "id" => "fechaPedido","name" => "fechaPedido"]) }}
                {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Sku (*)') }}
                <select name="select_sku" id="select_sku" class="form-select @error('sku') is-invalid @enderror" onchange="obtenerSku();"  >
                    <option value="">Seleccione  el sku</option>           
                    @foreach ($sku as $sk)
                    <option value="{{ $sk->sku }}">{{ $sk->descripcion }}</option>
                    @endforeach
                
                </select>
               
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Codigo del sku ') }}
                {{ Form::text('sku', null, ['class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''), "id" => "sku","name" => "sku", 'placeholder' => 'Ingrese la cantidad','readonly']) }}
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad (*)') }}
                {{ Form::number('cant', null, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;", 'placeholder' => 'Ingrese la cantidad']) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 

            <div class="col-lg-6">
                {{ Form::label('Costo unitario ') }}
                {{ Form::number('costoUnitario', old('costoUnitario'), ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario",'placeholder' => 'Costo Unitario','readonly']) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Costo total') }}
                {{ Form::number('costoTotal', old('costoTotal'), ['class' => 'form-control' . ($errors->has('costoTotal') ? ' is-invalid' : ''), "id" => "costoTotal","name" => "costoTotal","onKeyPress"=> "if(this.value.length==12) return false;",'readonly', 'placeholder' => 'Costo Total']) }}
                {!! $errors->first('costoTotal', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
            
           
          <script src="{{asset("assets/team/scripts/tables/abastecimiento/transacciones/despacho_form.js")}}"></script>
        </div>
      </div>
    </div>
    <script>    

    function obtenerSku()    {  
        var sku = document.getElementById('select_sku').value;      
        document.getElementById('sku').value = sku;
       
    }
    function obtenerCosto()    {  
        var cant = document.getElementById('cant').value;
        var costoUnitario = document.getElementById('costoUnitario').value;
        const total = parseFloat(cant) * parseFloat(costoUnitario);
        document.getElementById('costoTotal').value = total;
       
    }


    </script>
</div>