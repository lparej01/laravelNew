<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Nombre del Proveedor (*)') }}
                    {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del proveedor']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
             <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Contacto (*)') }}
                    {{ Form::text('contacto', null, ['class' => 'form-control' . ($errors->has('contacto') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del Contacto']) }}
                    {!! $errors->first('contacto', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <br>
             <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Telefono Principal') }}
                    {{ Form::number('telf1', null, ['class' => 'form-control' . ($errors->has('telf1') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el telefono principal']) }}
                    {!! $errors->first('telf1', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Otro Telefono') }}
                    {{ Form::number('telf2', null, ['class' => 'form-control' . ($errors->has('telf2') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese otro telefono']) }}
                    {!! $errors->first('telf2', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Telefono de Contacto (*)') }}
                    {{ Form::number('telefContact', null, ['class' => 'form-control' . ($errors->has('telefContact') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese  Telefono de contacto']) }}
                    {!! $errors->first('telefContact', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>

            <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Email') }}
                    {{ Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
             <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Email de Contacto (*)') }}
                    {{ Form::email('emailContacto', null, ['class' => 'form-control' . ($errors->has('emailContacto') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese email de contacto']) }}
                    {!! $errors->first('emailContacto', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            
        </div>
    </div>
</div>