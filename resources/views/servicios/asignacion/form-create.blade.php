<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-3">
                {{ Form::label('Asignados (*)') }}
                {{ Form::text('equipo_asignado_person', null, ['class' => 'form-control' . ($errors->has('equipo_asignado_person') ? ' is-invalid' : ''),  "id" => "equipo_asignado_person","name" => "equipo_asignado_person","onKeyPress"=> "if(this.value.length==60) return false;" ,'placeholder' => 'Ingrese  a quien se le asigna']) }}
                {!! $errors->first('equipo_asignado_person', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
<br>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name ="tipo_equipo"   id="tipo_equipo" value="Tipo Pc" CheckState  checked>
         <label class="form-check-label" for="flexSwitchCheckDefault"> Tipo Pc</label>
        </div>          
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name ="tipo_equipo"   id="tipo_equipo" value="Tipo  Laptop" CheckState >
         <label class="form-check-label" for="flexSwitchCheckDefault"> Tipo  Laptop</label>
    </div>          
          
</div>

</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-3">
                {{ Form::label('Teclado') }}
                {{ Form::text('teclado_serial', null, ['class' => 'form-control' . ($errors->has('teclado_serial') ? ' is-invalid' : ''),  "id" => "teclado_serial","name" => "teclado_serial","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese el serial']) }}
                {!! $errors->first('teclado_serial', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
<br>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name ="mouse"  id="mouse" value=1  CheckState >
         <label class="form-check-label" for="flexSwitchCheckDefault">Mouse</label>
    </div>          
          


<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-3">
                {{ Form::label('CPU') }}
                {{ Form::text('cpu_serial', null, ['class' => 'form-control' . ($errors->has('cpu_serial') ? ' is-invalid' : ''),  "id" => "cpu_serial","name" => "cpu_serial","onKeyPress"=> "if(this.value.length==3mouse0) return false;" ,'placeholder' => 'Ingrese el serial']) }}
                {!! $errors->first('cpu_serial', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-6">
                {{ Form::label('CONECTORES') }}
                <div class="box-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name ="conector_internet"  id="conector_internet" CheckState >
                     <label class="form-check-label" for="flexSwitchCheckDefault">Conector Internet</label>
                </div>  
                <div class="box-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name ="conector_corriente_cpu"   id="conector_corriente_cpu" CheckState >
                     <label class="form-check-label" for="flexSwitchCheckDefault">Conector Corriente CPU</label>
                </div>     
                <div class="box-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name ="conector_corriente_monitor"   id="conector_corriente_monitor" CheckState >
                     <label class="form-check-label" for="flexSwitchCheckDefault">Conector Corriente Monitor</label>
                </div>     
                <div class="box-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name ="conector_cpu_monitor"    id="conector_cpu_monitor" CheckState >
                     <label class="form-check-label" for="flexSwitchCheckDefault">Conector CPU Monitor</label>
                </div>        
            </div>          
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        {{ Form::label('Estado del Equipo') }}
        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name ="status"  value="1"  id="status" CheckState >
         <label class="form-check-label" for="flexSwitchCheckDefault"> Activo</label>
    </div>  
    <div class="box-body">
        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name ="status"  value="0"  id="status" CheckState >
         <label class="form-check-label" for="flexSwitchCheckDefault"> Desactivado</label>
    </div>           
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-6">
                {{ Form::label('Procesador') }}
                {{ Form::text('procesador', null, ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''),  "id" => "procesador","name" => "procesador","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Procesador Intel..']) }}
                {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-6">
                {{ Form::label ('Almacenamoiento de Datos') }}
                {{ Form::text('disco', null, ['class' => 'form-control' . ($errors->has('disco') ? ' is-invalid' : ''),  "id" => "disco","name" => "disco","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Cantidad de Almacenamiento GB']) }}
                {!! $errors->first('disco', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-6">
                {{ Form::label('Escritorio Remoto') }}
                {{ Form::text('any_desk', null, ['class' => 'form-control' . ($errors->has('any_desk') ? ' is-invalid' : ''),  "id" => "any_desk","name" => "any_desk","onKeyPress"=> "if(this.value.length==30) return false;" ,'placeholder' => 'Ingrese el codigo Any Desk']) }}
                {!! $errors->first('any_desk', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
            <div class="col-lg-6">
                {{ Form::label('Correo electronico') }}
                {{ Form::email('correo_electronico', null, ['class' => 'form-control' . ($errors->has('correo_electronico') ? ' is-invalid' : ''),  "id" => "correo_electronico","name" => "correo_electronico","onKeyPress"=> "if(this.value.length==60) return false;" ,'placeholder' => 'Ingrese el correo electronico']) }}
                {!! $errors->first('correo_electronico', '<div class="invalid-feedback">:message</div>') !!}
            </div>          
          
</div>
