<div class="box box-info padding-1">
    <div class="box-body">
          

            <div class="col-lg-6">
                {{ Form::label('Persona - Unidad solicitante (*)') }}
                {{ Form::text('usuarios', null, ['class' => 'form-control' . ($errors->has('usuarios') ? ' is-invalid' : ''),  "id" => "usuarios","name" => "usuarios","onKeyPress"=> "if(this.value.length==50) return false;",'placeholder' => 'Ingrese el Nombre de Usuario']) }}
                {!! $errors->first('usuarios', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Departamento (*)') }}
                <select name="depart_id" id="depart_id" class="form-select @error('depart_id') is-invalid @enderror" >
                  <option value=""selected> Seleccione un Departamento</option>             
                  @foreach ($departamentos as $item)
                  <option value="{{  $item->id }}" > {{ $item->nombre}}</option>  
                  @endforeach          
                     
               
               </select> 
                
                {!! $errors->first('depart_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br> 
            <div class="col-lg-6">
               
                {{ Form::label('Tipo de Incidencias (*)') }}               
                    @foreach ($incidencias as $item)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name ="incid_id[{{$item->nombre}}]"  value="{{$item->nombre}}"  id="incid_id" CheckState >
                         <label class="form-check-label" for="flexSwitchCheckDefault">{{ $item->nombre}}</label>
                        </div>                    
                    @endforeach           
              
                {!! $errors->first('incid_id', '<div class="invalid-feedback">:message</div>') !!}

                
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Fecha de la incidencia (*)') }}
                {{ Form::date('created_at', null, ['class' => 'form-control' . ($errors->has('created_at') ? ' is-invalid' : ''),  "id" => "created_at","name" => "created_at","onKeyPress"=> "if(this.value.length==50) return false;",'placeholder' => 'Ingrese el Nombre de Usuario']) }}
                {!! $errors->first('created_at', '<div class="invalid-feedback">:message</div>') !!}
            </div>       
          
            <br>           
            <div class="col-lg-6">
                {{ Form::label('Reseña') }}
                {{ Form::textarea('comentario', null, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), "id" => "comentario","name" => "comentario","onKeyPress"=> "if(this.value.length==200) return false;",'placeholder' => 'Describa la tarea realizada']) }}
                {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
             
        </div>
        <script>
          $('form').submit(function(e){
    
            if ($('input[type=checkbox]:checked').length === 0) {
            e.preventDefault();
            
            Biblioteca.notificaciones('Verifique', 'Seleccione los tipos de Incidencias', 'warning');
            }
        });
        

        </script>   
        <script src="{{asset("assets/team/funciones.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/team/js/toastr.min.js")}}" type="text/javascript"></script>
       