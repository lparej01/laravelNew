<div class="box box-info padding-1">
    <div class="box-body">

       
            <div class="col-lg-6">
                {{ Form::label('Nombre del menu') }}
                {{ Form::text('nombre', $menu->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del menu' ,"id" => "nombre"]) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Url') }}
                {{ Form::text('url', $menu->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la url del menu' ,"id" => "url"]) }}
                {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
           
            <div class=" form-group col-6">
                    <div id="centrador" >
                    {{ Form::label('Icono') }}                    
                    <img id="imagen" src ="{{ asset('storage').'/'.$menu->icono}}"  class="rounded" width="100" height="100" >
                   
                    </div>
                   <label for="formFile" class="form-label">Icono menu</label>
                   <table style="border: 0px"><tr><td><input class="form-control" type="file" name="icono" id="icono"></td>
                     <td> <img id="imagenPrevisualizacion" style="width: 100px;height:120px"  style="height: 70px;"></td></tr></table>
                  
                   </div>
                  
                   <script src="script.js"></script>
                   {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
            </div>
             
            <div class="col-lg-6">
               
                {{ Form::hidden('id', $menu->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),"id" => "id"]) }}
                
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
                height: 30px;
                font-size: 18px;
                /*border: 1px*/
                padding-left: 25px; 
                }
                #imagenPrevisualizacion{
                width: 20px;
                height: 20px;
                }

               /* img{filter:invert(65%) sepia(71%) saturate(5198%) hue-rotate(161deg) brightness(94%) contrast(101%);}

                img:hover{filter:invert(65%) sepia(80%) saturate(586%) hue-rotate(2deg) brightness(107%) contrast(107%)}*/

            </style>
          
        </div>
      </div>
    </div>
</div>
