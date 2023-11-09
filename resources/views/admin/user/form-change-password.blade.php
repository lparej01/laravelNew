<div class="box box-info padding-1">
    <div class="box-body" >

        {{-- <div class="row">
            <div class=" form-group col-6">
                {{ Form::label('Contraseña') }}
                {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class=" form-group col-6">
                {{ Form::label('Verificar Contraseña') }}
                {{ Form::password('password_verificate', ['class' => 'form-control' . ($errors->has('password_verificate') ? ' is-invalid' : ''), 'placeholder' => 'Verificar Contraseña']) }}
                {!! $errors->first('password_verificate', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div> --}}

        <div class="row"  x-data="{ show_password: true, show_password_verificate: true, password_verificate: '' , password: ''}">

            <div class=" form-group col-6">
                <div class="input-group col-6">

                    <template x-if="show_password">
                        {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su contraseña', 'x-model' => 'password']) }}
                    </template>

                    <template x-if="!show_password">
                        {{ Form::text('password', '', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su contraseña', 'x-model' => 'password']) }}
                    </template>

                    <button x-on:click="show_password = !show_password" id="show_password"
                        class="btn btn-white blur btn-only btn-link border  input-group-append" type="button"> 
                        <template x-if="show_password">
                            <i  class="fa fa-eye-slash icon"></i>    
                        </template> 
                        <template x-if="!show_password" >
                            <i class="fa fa-eye icon"></i>    
                        </template> 
                    </button>

                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class=" form-group col-6">
                <div class="input-group col-6">

                    <template x-if="show_password_verificate">
                        {{ Form::password('password_verificate', ['class' => 'form-control' . ($errors->has('password_verificate') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su contraseña', 'x-model' => 'password_verificate']) }}
                    </template>

                    <template x-if="!show_password_verificate">
                        {{ Form::text('password_verificate', '', ['class' => 'form-control' . ($errors->has('password_verificate') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su contraseña', 'x-model' => 'password_verificate']) }}
                    </template>

                    <button x-on:click="show_password_verificate = !show_password_verificate" id="show_password"
                        class="btn btn-white blur btn-only btn-link border  input-group-append" type="button"> 
                        <template x-if="show_password_verificate">
                            <i  class="fa fa-eye-slash icon"></i>    
                        </template> 
                        <template x-if="!show_password_verificate" >
                            <i class="fa fa-eye icon"></i>    
                        </template> 
                    </button>
                    
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>


            {{-- <div class=" form-group col-6">
                <div class="input-group col-6" x-data="{ show: true, password: '' }">

                    <template x-if="show">
                        {{ Form::password('password_verificate', ['class' => 'form-control' . ($errors->has('password_verificate') ? ' is-invalid' : ''), 'placeholder' => 'Verificar Contraseña', 'x-model' => 'password']) }}
                    </template>

                    <template x-if="!show">
                        {{ Form::password('password_verificate', ['class' => 'form-control' . ($errors->has('password_verificate') ? ' is-invalid' : ''), 'placeholder' => 'Verificar Contraseña', 'x-model' => 'password']) }}
                        {{ Form::text('password', '', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su contraseña', 'x-model' => 'password']) }}
                    </template>

                    <button x-on:click="show = !show" id="show_password"
                        class="btn btn-white blur btn-only btn-link border  input-group-append" type="button"> <span
                            x-data='{ show: true }' class="fa fa-eye-slash icon"></span> </button>

                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div> --}}

        </div>
        


    </div>

</div>

</div>
