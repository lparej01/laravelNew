<div class="box box-info padding-1">
    <div class="box-body">
       <h4>Producto Combo existencia</h4>
        <div class="col-lg-6">
            {{ Form::label('Combo') }}
            {{ Form::text('comboId', $producto->comboId, ['class' => 'form-control' . ($errors->has('comboId') ? ' is-invalid' : ''),  "id" => "comboId","name" => "comboId",'readonly']) }}
            {!! $errors->first('comboId', '<div class="invalid-feedback">:message</div>') !!}
        </div>      
       
        
        <div class="col-lg-6">
            {{ Form::label('Periodo') }}
            {{ Form::text('periodo', $producto->periodo, ['class' => 'form-control' . ($errors->has('periodo') ? ' is-invalid' : ''), "id" => "periodo","name" => "periodo",'readonly']) }}
            {!! $errors->first('periodo', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Nombre del Combo') }}
            {{ Form::text('descCombo', $producto->descCombo, ['class' => 'form-control' . ($errors->has('descCombo') ? ' is-invalid' : ''), "id" => "descCombo","name" => "descCombo",'readonly']) }}
            {!! $errors->first('descCombo', '<div class="invalid-feedback">:message</div>') !!}
        </div>            

        <div class="col-lg-6">
            {{ Form::label('Inventario Inicial') }}
            {{ Form::number('invInicial', $producto->invInicial, ['class' => 'form-control' . ($errors->has('invInicial') ? ' is-invalid' : ''), "id" => "invInicial","name" => "invInicial","onKeyPress"=> "if(this.value.length==10) return false;"]) }}
            {!! $errors->first('invInicial', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Costo Unitario') }}
            {{ Form::text('costoUnitario', $producto->costoUnitario, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario",'readonly']) }}
            {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
         <div class="col-lg-6">
            {{ Form::label('Merma') }}
            {{ Form::text('merma', $producto->merma, ['class' => 'form-control' . ($errors->has('merma') ? ' is-invalid' : ''), "id" => "merma","name" => "merma","onKeyPress"=> "if(this.value.length==10) return false;"]) }}
            {!! $errors->first('merma', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
         <div class="col-lg-6">
            {{ Form::label('Precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), "id" => "precio","name" => "precio","onKeyPress"=> "if(this.value.length==5) return false;"]) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>   
            
             
           
          
        </div>
      </div>
    </div>
</div>