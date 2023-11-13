<div class="box box-info padding-1">
    <div class="box-body">
          
            <div class="col-lg-6">
                {{ Form::label('Tipo de movimiento (*)') }}
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
                {{ Form::label('Sku o Catalogo (*)') }}
                <select name="sku" id="sku" class="form-select @error('sku') is-invalid @enderror" >
                    <option value="0">Seleccione el sku </option>
                    @foreach ($movsku as $sku)
                    <option value="{{ $sku->sku }}">{{ $sku->descripcion }}</option>
                    @endforeach
                
                </select>
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br> 
            <div class="col-lg-6">
                {{ Form::label('Fecha Movimiento') }}
                {{ Form::date('fechaMovinv', null, ['class' => 'form-control' . ($errors->has('fechaMovinv') ? ' is-invalid' : ''), "id" => "fechaMovinv","name" => "fechaMovinv", "onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('fechaMovinv', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Cantidad') }}
                {{ Form::number('cant', null, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
          
           
             
           
          
        </div>
      </div>
    </div>
</div>