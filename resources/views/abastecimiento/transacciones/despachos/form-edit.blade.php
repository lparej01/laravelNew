<div class="box box-info padding-1">
    <div class="box-body">          
        
            <div class="col-lg-6">
                {{ Form::label('Fecha de la Solicitud (*)') }}
                {{ Form::text('fechaPedido', date(" Y-m-d "), ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''),  "id" => "fechaPedido","name" => "fechaPedido",'readonly']) }}
                {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Sku (*)') }}
                <select name="select_sku" id="select_sku" class="form-select @error('sku') is-invalid @enderror"  onchange="obtenerSku();" >
                               
                    <option value="{{ $sku->sku }}">{{ $sku->descripcion }}</option>  
                    @foreach ($skudif as $sk)
                    <option value="{{ $sk->sku }}">{{ $sk->descripcion }}</option>
                    @endforeach
                
                </select>
               
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Sku (*)') }}
                {{ Form::number('sku',$sku->sku, ['class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''), "id" => "sku","name" => "sku","onKeyPress"=> "if(this.value.length==12) return false;", 'placeholder' => 'Ingrese la cantidad']) }}
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad (*)') }}
                {{ Form::number('cant', $despachos->cant, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;", 'placeholder' => 'Ingrese la cantidad']) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 

            <div class="col-lg-6">
                {{ Form::label('Costo Unitario (*)') }}
                {{ Form::number('costoUnitario', old('costoUnitario',$despachos->costoUnitario), ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario",'placeholder' => 'Ingrese el costo unitario','readonly']) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Costo Total') }}
                {{ Form::number('costoTotal', old('costoTotal',$despachos->costoTotal), ['class' => 'form-control' . ($errors->has('costoTotal') ? ' is-invalid' : ''), "id" => "costoTotal","name" => "costoTotal", 'placeholder' => 'Costo Total','readonly']) }}
                {!! $errors->first('costoTotal', '<div class="invalid-feedback">:message</div>') !!}
            </div>   
            
           
          <script src="{{asset("assets/team/scripts/tables/abastecimiento/transacciones/despacho_form.js")}}"></script>
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
</div>