<div class="box box-info padding-1">
    <div class="box-body">
          

            <div class="col-lg-6">
                {{ Form::label('Nombre del departamento') }}
                {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),  "id" => "nombre","name" => "nombre","onKeyPress"=> "if(this.value.length==20) return false;" ,'placeholder' => 'Ingrese el nuevo departamento']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
           
          
</div>