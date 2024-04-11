<div class="box box-info padding-1">
    <div class="box-body">
          

        <div class="col-lg-6">
            {{ Form::label('Indentificador') }}
            {{ Form::text('id',  $data->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),  "id" => "id","name" => "id",'readonly']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
           
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
          

        <div class="col-lg-6">
            {{ Form::label('Nombre del Equipo') }}
            {{ Form::text('nombre_equipo',  $data->nombre_equipo, ['class' => 'form-control' . ($errors->has('nombre_equipo') ? ' is-invalid' : ''),  "nombre_equipo" => "nombre_equipo","name" => "nombre_equipo",'readonly']) }}
            {!! $errors->first('nombre_equipo', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
           
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
          

        <div class="col-lg-6">
            {{ Form::label('Oficina o Departamento') }}
            {{ Form::text('oficina',  $data->oficina, ['class' => 'form-control' . ($errors->has('oficina') ? ' is-invalid' : ''),  "oficina" => "oficina","name" => "oficina",'readonly']) }}
            {!! $errors->first('oficina', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
           
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
          

        <div class="col-lg-6">
            {{ Form::label('Estado') }}
            <select name="Status" id="Status" class="form-select @error('Status') is-invalid @enderror" >
                              
                @if ($data->Status == 'Activo')
                    <option value="1" selected>Activo </option> 
                    <option value="0">Inactivo</option>  
                    @else
                    <option value="0"selected>Inactivo</option> 
                    <option value="1">Activo</option>   
                @endif               
           
           </select> 
           
            {!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
           
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
          

        <div class="col-lg-6">
            {{ Form::label('Equipo Asignado') }}
            {{ Form::text('equipo_asignado_person',  $data->equipo_asignado_person, ['class' => 'form-control' . ($errors->has('equipo_asignado_person') ? ' is-invalid' : ''),  "equipo_asignado_person" => "equipo_asignado_person","name" => "equipo_asignado_person"]) }}
            {!! $errors->first('equipo_asignado_person', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
           
          
</div>
<div class="box box-info padding-1">
    <div class="box-body">
          

        <div class="col-lg-6">
            {{ Form::label('Dominio del Sistema') }}
            <select name="dominio" id="dominio" class="form-select @error('dominio') is-invalid @enderror" >
            @if ($data->dominio == 'Registrado en el Dominio')
            <option value="1" selected>Registrado en el Dominio </option> 
            <option value="0">No esta en el dominio</option>  
            @else
            <option value="0"selected>No esta en el dominio</option> 
            <option value="1">Registrado en el Dominio</option>   
             @endif  
            </select>          
            {!! $errors->first('dominio', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
           
          
</div>
