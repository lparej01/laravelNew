<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Nombre del Rol (*)') }}
                    {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del rol',"onKeyPress"=> "if(this.value.length==40) return false;"]) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <br>
            
        </div>
    </div>
</div>
