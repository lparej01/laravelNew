<div class="box box-info padding-1">
    <div class="box-body">

       
            <div class="col-lg-6">
                {{ Form::label('Nombre del Permiso') }}
                {{ Form::text('nombre', $permiso->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del permiso' ,"id" => "nombre"]) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>           
            <div class="col-lg-6">
               
                {{ Form::hidden('id', $permiso->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),"id" => "id"]) }}
                
            </div>
            
           
        </div>
      </div>
    </div>
</div>
