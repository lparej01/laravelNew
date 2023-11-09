        <div class="row">
            <div class=" form-group col-6">
                {{ Form::label('Nombre (*)') }}
                {{ Form::text('names', '', ['class' => 'form-control' . ($errors->has('names') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class=" form-group col-6">
                {{ Form::label('Apellidos (*)') }}
                {{ Form::text('surnames', '', ['class' => 'form-control' . ($errors->has('surnames') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                {!! $errors->first('surnames', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class=" form-group col-6">
                {{ Form::label('Username (*)') }}
                {{ Form::text('username', '', ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de usuario']) }}
                {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class=" form-group col-6">
                {{ Form::label('Correo Electronico(*)') }}
                {{ Form::text('email', '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electrónico']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        </div>
        <div class="row">
            <div class=" form-group col-6">
                <label for="password">{{ __('Password (*)') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password"  autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class=" form-group col-6">
                <label for="password-confirm">{{ __('Confirm Password (*)') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                    autocomplete="new-password">
            </div>

        </div>
        <div class="row">
            <div class=" form-group col-12">
                <label for="formFile" class="form-label">Imagen de Usuario
                </label>
                <table><tr><td><input class="form-control" type="file" name="images" id="images"></td>
                <td><img id="imagenPrevisualizacion" ></td>
               </tr></table>
                
            </div>          
          
            <script>
                const $images = document.querySelector("#images"),
                $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

                // Escuchar cuando cambie
                $images.addEventListener("change", () => {
                // Los archivos seleccionados, pueden ser muchos o uno
                const archivos = $images.files;
                // Si no hay archivos salimos de la función y quitamos la imagen
                if (!archivos || !archivos.length) {
                    $imagenPrevisualizacion.src = "";
                    return;
                }
                // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                const primerArchivo = archivos[0];
                // Lo convertimos a un objeto de tipo objectURL
                const objectURL = URL.createObjectURL(primerArchivo);
                // Y a la fuente de la imagen le ponemos el objectURL
                $imagenPrevisualizacion.src = objectURL;
                });

            </script>
            <style>

                /*contenedor del form*/
                .modal-content{
                background-color: #ffffff;
                    /*opacity: .85;*/
                padding: 0 20px; 
                box-shadow: 0px 0px 3px #43B4E4;  
                }
                .form-groupI input[type=file]{
                height: 30px;
                font-size: 18px;
                border: 0px
                padding-left: 25px; 
                }
                #imagenPrevisualizacion{
                width: 100px;
                height: 100px;
                }
                img{
                    border-radius:20px 20px 20px 20px;

                }
               
              
            </style>
        </div>
