<div class="box box-info padding-1">
    <div class="box-body">

       
            <div class="col-lg-6">
                {{ Form::label('Nombre') }}
                {{ Form::text('nombre', $rolid->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del rol' ,"id" => "nombre"]) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>           
            <div class="col-lg-6">
               
                {{ Form::hidden('id', $rolid->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),"id" => "id"]) }}
                
            </div>
            
           
        </div>
      </div>
    </div>
</div>
