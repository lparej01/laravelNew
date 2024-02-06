
<div class="box box-info padding-1">
    <div class="box-body">
          
            <div class="col-lg-6">
                {{ Form::label('Caso nro') }}
                {{ Form::text('id', $soporte->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),  "id" => "id","name" => "id",'readonly']) }}
                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Persona - Unidad solicitante') }}
                {{ Form::text('usuarios', $soporte->usuarios, ['class' => 'form-control' . ($errors->has('usuarios') ? ' is-invalid' : ''),  "id" => "usuarios","name" => "usuarios","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('usuarios', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Departamento') }}
              <select name="depart_id" id="depart_id" class="form-select @error('depart_id') is-invalid @enderror" >                                    
                   <option value="{{$departId->id }}">{{    $departId->nombre }}</option>    
                   @foreach ($departamentos as $item)
                        <option value="{{  $item->id }}">{{  $item->nombre }}</option>    
                    @endforeach                 
                </select>                
                {!! $errors->first('depart_id', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Incidencias') }}
                             
                    @foreach ($incidencias as $item)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name ="incid_id[{{$item}}]" id="incid_id" value="{{  $item }}" checked>
                         <label class="form-check-label" for="flexSwitchCheckDefault">{{ $item}}</label>
                        </div>
                    
                    @endforeach  
                    
                    @foreach ($incidenc as $item)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name ="incid_id[{{$item->nombre}}]" id="incid_id" value="{{$item->nombre}}">
                     <label class="form-check-label" for="flexSwitchCheckDefault">{{ $item->nombre}}</label>
                    </div>
                
                @endforeach    
            {!! $errors->first('inicid_id', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
          <div class="col-lg-6">
                {{ Form::label('Estado de la Incidencia') }}               
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" >
                              
                     @if ($soporte->status == 1)
                    <option value="{{  $soporte->status }}" selected> En Proceso </option> 
                    <option value="2">Caso Cerrado</option>  
                    @else
                    <option value="{{  $soporte->status }}"selected> Caso Cerrado </option> 
                    <option value="1">En Proceso</option>   
                    @endif          
                
                </select> 
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Reseña') }}
                {{ Form::textarea('comentario', $soporte->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), "id" => "comentario","name" => "comentario"]) }}
                {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
            </div>

           
             
           
          
        </div>
      </div>
    </div>
</div>