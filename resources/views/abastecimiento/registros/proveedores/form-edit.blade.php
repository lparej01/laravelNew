<div class="box box-info padding-1">
    <div class="box-body">

       
            <div class="col-lg-6">
                {{ Form::label('Nombre del proveedor') }}
                {{ Form::text('nombre', $proveedor->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),  "id" => "nombre","name" => "nombre"]) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Contacto') }}
                {{ Form::text('contacto', $proveedor->contacto, ['class' => 'form-control' . ($errors->has('contacto') ? ' is-invalid' : ''),  "id" => "contacto","name" => "contacto"]) }}
                {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Teléfono') }}
                {{ Form::number('telf1', $proveedor->telf1, ['class' => 'form-control' . ($errors->has('telf1') ? ' is-invalid' : ''), "id" => "telf1","name" => "telf1", "onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('telf1', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Teléfono 2') }}
                {{ Form::number('telf2', $proveedor->telf2, ['class' => 'form-control' . ($errors->has('telf2') ? ' is-invalid' : ''), "id" => "telf2","name" => "telf2","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('telf2', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Teléfono Contacto') }}
                {{ Form::number('telf2', $proveedor->telfContacto, ['class' => 'form-control' . ($errors->has('telfContacto') ? ' is-invalid' : ''), "id" => "telfContacto","name" => "telfContacto","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('telf2', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Email') }}
                {{ Form::text('telf2', $proveedor->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), "id" => "email","name" => "email"]) }}
                {!! $errors->first('telf2', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Email contacto') }}
                {{ Form::text('telf2', $proveedor->emailContacto, ['class' => 'form-control' . ($errors->has('emailContacto') ? ' is-invalid' : ''), "id" => "emailContacto","name" => "emailContacto"]) }}
                {!! $errors->first('telf2', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
           
            
             
           
          
        </div>
      </div>
    </div>
</div>
