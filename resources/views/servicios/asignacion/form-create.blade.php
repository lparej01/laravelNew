<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Equipo asignado (*)') }}
                {{ Form::text('equipo_asignado_person', null, ['class' => 'form-control' . ($errors->has('equipo_asignado_person') ? ' is-invalid' : ''),  "id" => "equipo_asignado_person","name" => "equipo_asignado_person","onKeyPress"=> "if(this.value.length==60) return false;" ,'placeholder' => 'Ingrese  a quien se le asigna']) }}
                {!! $errors->first('equipo_asignado_person', '<div class="invalid-feedback">:message</div>') !!}
        </div>          
        <div class="form-check  form-check-inline col-lg-4">
            {{ Form::label('Registrado en el dominio (*)') }}  
              <select name="dominio_sistema" id="dominio_sistema" class="form-select @error('dominio_sistema') is-invalid @enderror" >
                <option value=""selected> Seleccione</option>                
                <option value="1" > Ingresado en el Dominio</option>  
                <option value="0" > No esta en el dominio</option>            
             
             </select> 
            
            {!! $errors->first('dominio_sistema', '<div class="invalid-feedback">:message</div>') !!}
        </div>   
   </div>  
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Oficina(*)') }}
                <select name="oficina" id="oficina" class="form-select @error('oficina') is-invalid @enderror" >
                    <option value=""selected> Seleccione</option>                
                    <option value="Baruta" > Baruta</option>  
                    <option value="Cagua" > Cagua</option>        
                 
                 </select> 
                
                {!! $errors->first('oficina', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Tipo de Equipo(*)') }}
                <select name="tipo_equipo" id="tipo_equipo" class="form-select @error('tipo_equipo') is-invalid @enderror" >
                    <option value=""selected> Seleccione</option>                
                    <option value="Baruta" > PC</option>  
                    <option value="Cagua" > Laptop</option>            
                 
                 </select> 
                {!! $errors->first('tipo_equipo', '<div class="invalid-feedback">:message</div>') !!}
            </div>                
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Sistema Operativo(*)') }}
                {{ Form::text('sistema_oper', null, ['class' => 'form-control' . ($errors->has('sistema_oper') ? ' is-invalid' : ''),  "id" => "sistema_oper","name" => "sistema_oper","onKeyPress"=> "if(this.value.length==50) return false;" ,'placeholder' => 'Sistema Operativo']) }}
                {!! $errors->first('sistema_oper', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Tipo de Procesedor(*)') }}
                {{ Form::text('procesador', null, ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''),  "id" => "procesador","name" => "procesador","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Procesador Intel..']) }}
                {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
            </div>              
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Disco duro (*)') }}
                {{ Form::text('disco', null, ['class' => 'form-control' . ($errors->has('disco') ? ' is-invalid' : ''),  "id" => "disco","name" => "disco","onKeyPress"=> "if(this.value.length==50) return false;" ,'placeholder' => 'Disco almacenamiento de datos']) }}
                {!! $errors->first('disco', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Procesador Almacenamiento(*)') }}
                {{ Form::text('memoria_ram', null, ['class' => 'form-control' . ($errors->has('memoria_ram') ? ' is-invalid' : ''),  "id" => "memoria_ram","name" => "memoria_ram","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Memoria expresadas en GB..']) }}
                {!! $errors->first('memoria_ram', '<div class="invalid-feedback">:message</div>') !!}
            </div>              
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('CPU Marca (*)') }}
                {{ Form::text('cpu_marca', null, ['class' => 'form-control' . ($errors->has('cpu_marca') ? ' is-invalid' : ''),  "id" => "cpu_marca","name" => "cpu_marca","onKeyPress"=> "if(this.value.length==50) return false;" ,'placeholder' => 'Marca de CPU']) }}
                {!! $errors->first('cpu_marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('CPU Serial Inv(*)') }}
                {{ Form::text('cpu_serial', null, ['class' => 'form-control' . ($errors->has('cpu_serial') ? ' is-invalid' : ''),  "id" => "cpu_serial","name" => "cpu_serial","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Marca Serial']) }}
                {!! $errors->first('cpu_serial', '<div class="invalid-feedback">:message</div>') !!}
            </div>              
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Teclado Marca') }}
                {{ Form::text('teclado_marca', null, ['class' => 'form-control' . ($errors->has('teclado_marca') ? ' is-invalid' : ''),  "id" => "teclado_marca","name" => "teclado_marca","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese la Marca']) }}
                {!! $errors->first('teclado_marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Teclado Serial Inv') }}
                {{ Form::text('teclado_marca', null, ['class' => 'form-control' . ($errors->has('teclado_serial') ? ' is-invalid' : ''),  "id" => "teclado_serial","name" => "teclado_serial","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese el serial']) }}
                {!! $errors->first('teclado_serial', '<div class="invalid-feedback">:message</div>') !!}
            </div>             
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Mouse Marca') }}
                {{ Form::text('mouse_marca', null, ['class' => 'form-control' . ($errors->has('mouse_marca') ? ' is-invalid' : ''),  "id" => "mouse_marca","name" => "mouse_marca","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese la Marca']) }}
                {!! $errors->first('mouse_marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Mouse Serial Inv') }}
                {{ Form::text('monitor_serial', null, ['class' => 'form-control' . ($errors->has('mouse_serial') ? ' is-invalid' : ''),  "id" => "mouse_serial","name" => "mouse_serial","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese el serial']) }}
                {!! $errors->first('mouse_serial', '<div class="invalid-feedback">:message</div>') !!}
            </div>             
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Monitor Marca') }}
                {{ Form::text('monitor_marca', null, ['class' => 'form-control' . ($errors->has('monitor_marca') ? ' is-invalid' : ''),  "id" => "monitor_marca","name" => "monitor_marca","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese la Marca']) }}
                {!! $errors->first('monitor_marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Monitor Serial Inv') }}
                {{ Form::text('monitor_serial', null, ['class' => 'form-control' . ($errors->has('monitor_serial') ? ' is-invalid' : ''),  "id" => "monitor_serial","name" => "monitor_serial","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese el serial']) }}
                {!! $errors->first('monitor_serial', '<div class="invalid-feedback">:message</div>') !!}
            </div>             
          
  </div>
</div>
<div class="box box-info padding-1">
    <div class="box-body">
             <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Escritorio Remoto (*)') }}
                {{ Form::text('any_desk', null, ['class' => 'form-control' . ($errors->has('any_desk') ? ' is-invalid' : ''),  "id" => "any_desk","name" => "any_desk","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Ingrese el codigo Any Desk']) }}
                {!! $errors->first('any_desk', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            <div class="form-check  form-check-inline col-lg-4">
                {{ Form::label('Correo electronico') }}
                {{ Form::email('correo_electronico', null, ['class' => 'form-control' . ($errors->has('correo_electronico') ? ' is-invalid' : ''),  "id" => "correo_electronico","name" => "correo_electronico","onKeyPress"=> "if(this.value.length==60) return false;" ,'placeholder' => 'Ingrese el correo electronico']) }}
                {!! $errors->first('correo_electronico', '<div class="invalid-feedback">:message</div>') !!}
            </div>              
          
        </div>

</div>
<div class="box box-info padding-1">
    <div class="box-body">               
        <div class="form-check  form-check-inline col-lg-4">
            {{ Form::label('Comentario') }}
            {{ Form::textarea('any_desk', null, ['class' => 'form-control' . ($errors->has('any_desk') ? ' is-invalid' : ''),  "id" => "any_desk","name" => "any_desk","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Ingrese el codigo Any Desk','rows'=>'3']) }}
            {!! $errors->first('any_desk', '<div class="invalid-feedback">:message</div>') !!}
        </div>  
        <div class="form-check  form-check-inline col-lg-4">
           
        </div>  
           

</div>
<div class="container">
    {{ Form::label('CONECTORES') }}
    <div class="box box-info padding-1">
        <div class="box-body">   
                
                    <div class="form-check form-switch form-check-inline col-lg-4">
                    
                        <input class="form-check-input" type="radio" name ="conector_internet"  id="conector_internet" value="1" checked >
                    <label class="form-check-label" for="flexSwitchCheckDefault">Conector Internet</label>
                </div> 

                <div class="form-check form-switch form-check-inline col-lg-4">
                        
                        <input class="form-check-input" type="radio" name ="conector_internet"  id="conector_internet_OFF" value="0" CheckState >
                    <label class="form-check-label" for="flexSwitchCheckDefault">Sin Conector Internet</label>
                </div>  

        </div>        
    </div> 
    <div class="box box-info padding-1">
        <div class="box-body">  
                    <div class="form-check form-switch form-check-inline col-lg-4">
                        
                            <input class="form-check-input" type="radio" name ="conector_corriente_cpu"   id="conector_corriente_cpu"  value="1" checked >
                        <label class="form-check-label" for="flexSwitchCheckDefault">Conector Corriente CPU</label>
                    </div> 
                    <div class="form-check form-switch form-check-inline col-lg-4">
                        
                        <input class="form-check-input" type="radio" name ="conector_corriente_cpu"   id="conector_corriente_cpu" value="0"  >
                    <label class="form-check-label" for="flexSwitchCheckDefault">Sin Conector Corriente CPU</label>
                </div>
            </div>
    </div> 
        <div class="box box-info padding-1">
        <div class="box-body"> 
                    <div class="form-check form-switch form-check-inline col-lg-4">
                        
                            <input class="form-check-input" type="radio" name ="conector_corriente_monitor"   id="conector_corriente_monitor" value="1" checked >
                        <label class="form-check-label" for="flexSwitchCheckDefault">Conector Corriente Monitor</label>
                    </div>     
                    <div class="form-check form-switch form-check-inline col-lg-4">
                    
                            <input class="form-check-input" type="radio" name ="conector_corriente_monitor"    id="conector_corriente_monitor" value="0" CheckState >
                        <label class="form-check-label" for="flexSwitchCheckDefault">Sin Conector Corriente Monitor </label>
                    </div>        
            </div>   

        </div>

        <div class="box box-info padding-1">
            <div class="box-body"> 
                    <div class="form-check form-switch form-check-inline col-lg-4">
                        
                            <input class="form-check-input" type="radio" name ="conector_cpu_monitor"   id="conector_cpu_monitor"   value="1" checked CheckState>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Conector CPU Monitor</label>
                    </div>     
                    <div class="form-check form-switch form-check-inline col-lg-4">
                    
                            <input class="form-check-input" type="radio" name ="conector_cpu_monitor"    id="conector_cpu_monitor" value="0" CheckState >
                        <label class="form-check-label" for="flexSwitchCheckDefault">Sin Conector CPU Monitor</label>
                    </div>        
            </div>          
        </div>        
    
        {{ Form::label('Estado del Equipo') }}
    <div class="box box-info padding-1">
            <div class="box-body">
                

                <div class="form-check form-switch form-check-inline col-lg-4">
                    <input class="form-check-input" type="radio" name ="status"  value="1"  id="status" CheckState  checked>
                <label class="form-check-label" for="flexSwitchCheckDefault"> Activo</label>
            </div>  
            
                <div class="form-check form-switch form-check-inline col-lg-4">
                    <input class="form-check-input" type="radio" name ="status"  value="0"  id="status" CheckState >
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Desactivado</label>
            </div>           
            </div>       
    </div>
    
   
</div>

