<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Permiso') }}
                    {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del permiso']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>

           
            <br>
            
        </div>
    </div>
</div>