<div class="box box-info padding-1">
    <div class="box-body">
       
            <div class="row">
                
                <div class=" form-group col-6">
                    {{ Form::label('Nombres') }}
                    {{ Form::text('names', $user->names, ['class' => 'form-control' . ($errors->has('names') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class=" form-group col-6">
                    {{ Form::label('Apellidos') }}
                    {{ Form::text('surnames', $user->surnames, ['class' => 'form-control' . ($errors->has('surnames') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
                    {!! $errors->first('surnames', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class=" form-group col-12">
                    {{ Form::label('Correo Electrónico') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electrónico']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <style>
                   #centrador{
                    position: relative;
                    width: 400px;
                    height: 200px;
                    
                    #imagen{
                        position: absolute;
                        width: 100px;
                        top: -2;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        margin: auto;
                    }
                </style>
                <div class=" form-group col-12">
                     <select name="status" id="status" class="form-select @error('user.status') is-invalid @enderror" placeholder = "Seleccionar el estado">
                             
                            @if ($user->status = 1)
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                            @else
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                            @endif                 
                        </select>
                             
                </div>

                
                <div class=" form-group col-6">
                    <div id="centrador" >
                    {{ Form::label('Foto de usuario') }}
                    @if ($user->images == null)
                    <img id="imagen" src ="{{ asset('storage').'/imagenes/avatar.png'}}"  class="rounded" width="200" height="120" >
                    @else
                    <img id="imagen" src ="{{ asset('storage').'/'.$user->images}}"  class="rounded" width="150" height="120" >
                     @endif 
                    </div>
                   <label for="formFile" class="form-label">Imagen de Usuario</label>
                 

                   <table><tr><td><input class="form-control" type="file" name="images" id="images"></td>
                    <td></td><td><img id="imagenPrevisualizacion" ></td>
                    <td></td></tr></table>
                </div>

                
               
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

</div>
