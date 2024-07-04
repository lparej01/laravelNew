<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-6">
                {{ Form::label('SKU') }}
                <select name="sku" id="unidadMedida" class="form-select @error('unidadMedida') is-invalid @enderror" >
                    <option value="0">Seleccione el SKU</option>
                    @foreach ($existencia as $item)
                          <option value="{{$item->sku}}" selected='selected'>{{ $item->sku."  ". $item->descripcion}}</option> 
                    @endforeach
                     
                
                </select>
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div>            
            <div class="col-lg-6">
                {{ Form::label('Inventario  inicial') }}
                {{ Form::number('invInicial', null, ['class' => 'form-control' . ($errors->has('invInicial') ? ' is-invalid' : ''), "id" => "invInicial","name" => "invInicial", "onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('invInicial', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
           
            
           
             
           
          
        </div>
      </div>
    </div>
</div>