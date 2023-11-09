<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
              <div class="row">

                <div class="col-lg-6">
                    {{ Form::label('Nombre del menu (*)') }}
                    {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del menu']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-lg-6">
                    {{ Form::label('Url') }}
                    {{ Form::text('url', null, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el url del menu']) }}
                    {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-lg-6">
                    {{ Form::label('Tipo de menu (*)') }}
                    @include('admin.menu.select-menu')
                    {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="col-lg-6">
                 <label for="formFile" class="form-label">Seleccione icono o imagen svg (*)</label>
                  <table><tr><td><input class="form-control is-invalid" type="file" name="icono" id="icono">
                    @error('icono')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                 </td>
                  <td> 
                 </td>
                  <td><img id="imagenPrevisualizacion" ></td></tr></table>    
                 
                 
                    
                </div>           
                       
   

                           
           
              </div>
              <script>
                const $icono = document.querySelector("#icono"),
                $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

                // Escuchar cuando cambie
                $icono.addEventListener("change", () => {
                // Los archivos seleccionados, pueden ser muchos o uno
                const archivos = $icono.files;
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
                height: 40px;
                font-size: 18px;
                border: 0px
                padding-left: 25px; 
                }
                #imagenPrevisualizacion{
                width: 50px;
                height: 50px;
                }

               /* img{filter:invert(65%) sepia(71%) saturate(5198%) hue-rotate(161deg) brightness(94%) contrast(101%);}

                img:hover{filter:invert(65%) sepia(80%) saturate(586%) hue-rotate(2deg) brightness(107%) contrast(107%)}*/

            </style>

           
        </div>           
            <br>
            
        </div>
    </div>
</div>