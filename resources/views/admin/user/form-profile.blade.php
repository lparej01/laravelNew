<div class="box box-info padding-1">
    <div class="box-body">
            <div class="row">
                <div class=" form-group col-6">
                    {{ Form::label('Nombres') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombres', 'readonly' => true]) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class=" form-group col-6">
                    {{ Form::label('Apellidos') }}
                    {{ Form::text('last_name', $user->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos', 'readonly' => true]) }}
                    {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class=" form-group col-12">
                    {{ Form::label('Correo Electrónico') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electrónico', 'readonly' => true]) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
    </div>

</div>
