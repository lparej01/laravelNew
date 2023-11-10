<div class="box box-info padding-1">
    <div class="box-body">
          
            <div class="col-lg-6">
                {{ Form::label('Catálogo o Sku') }}
                {{ Form::text('sku', $movinv->sku, ['class' => 'form-control' . ($errors->has('sku') ? ' is-invalid' : ''),  "id" => "sku","name" => "sku",'readonly']) }}
                {!! $errors->first('sku', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Tipo de movimiento') }}
                {{ Form::number('tipoMovinv', $movinv->tipoMovinv, ['class' => 'form-control' . ($errors->has('tipoMovinv') ? ' is-invalid' : ''),  "id" => "tipoMovinv","name" => "tipoMovinv","onKeyPress"=> "if(this.value.length==12) return false;",'readonly']) }}
                {!! $errors->first('tipoMovinv', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Inv Inicial') }}
                {{ Form::number('invInicial', $movinv->invInicial, ['class' => 'form-control' . ($errors->has('invInicial') ? ' is-invalid' : ''), "id" => "invInicial","name" => "invInicial", "onKeyPress"=> "if(this.value.length==12) return false;",'readonly']) }}
                {!! $errors->first('invInicial', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Entrada') }}
                {{ Form::number('entradas', $movinv->entradas, ['class' => 'form-control' . ($errors->has('entradas') ? ' is-invalid' : ''), "id" => "entradas","name" => "entradas","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('entradas', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Salida') }}
                {{ Form::number('salidas', $movinv->salidas, ['class' => 'form-control' . ($errors->has('salidas') ? ' is-invalid' : ''), "id" => "salidas","name" => "salidas","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('salidas', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Merma') }}
                {{ Form::number('merma', $movinv->merma, ['class' => 'form-control' . ($errors->has('merma') ? ' is-invalid' : ''), "id" => "merma","name" => "merma","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('merma', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Inventario Final') }}
                {{ Form::number('invFinal', $movinv->invFinal, ['class' => 'form-control' . ($errors->has('invFinal') ? ' is-invalid' : ''), "id" => "invFinal","name" => "invFinal","onKeyPress"=> "if(this.value.length==12) return false;",'readonly']) }}
                {!! $errors->first('invFinal', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            
           
             
           
          
        </div>
      </div>
    </div>
</div>