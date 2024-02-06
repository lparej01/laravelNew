<div class="box box-info padding-1">
    <div class="box-body">
          
            <div class="col-lg-6">
                {{ Form::label('Caso nro') }}
                {{ Form::text('id', $departamentos->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),  "id" => "id","name" => "id",'readonly']) }}
                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Nombre del departamento') }}
                {{ Form::text('nombre', $departamentos->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),  "id" => "nombre","name" => "nombre","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            
           
             
           
          
        </div>
      </div>
    </div>
</div>