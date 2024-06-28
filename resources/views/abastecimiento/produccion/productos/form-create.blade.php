<div class="box box-info padding-1">
    <div class="box-body">

        <div class="col-lg-6">
            {{ Form::label('Seleccione el Combo (*)') }}
            @include('abastecimiento.produccion.productos.select-combos')
            {!! $errors->first('descCombo', '<div class="invalid-feedback">:message</div>') !!}
        </div>      
          
            <div class="col-lg-6">
                {{ Form::label('Numero de Combo') }}
                {{ Form::text('comboId', null, ['class' => 'form-control' . ($errors->has('comboId') ? ' is-invalid' : ''),  "id" => "comboId","name" => "comboId",'readonly']) }}
                {!! $errors->first('comboId', '<div class="invalid-feedback">:message</div>') !!}
            </div>           
            <div class="col-lg-6">
                {{ Form::label('Inv Inicial') }}
                {{ Form::number('invInicial', 0, ['class' => 'form-control' . ($errors->has('invInicial') ? ' is-invalid' : ''), "id" => "invInicial","name" => "invInicial","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
                {!! $errors->first('invInicial', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
           
            <div class="col-lg-6">
                {{ Form::label('Precio') }}
                {{ Form::number('precio', 0, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), "id" => "precio","name" => "precio","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
                {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
           
            
             
           
          
        </div>
      </div>
    </div>
</div>