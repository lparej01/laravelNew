<div class="box box-info padding-1">
    <div class="box-body">       
        <div class="col-lg-6">
            {{ Form::label('Nombre del cátalogo o sku') }}
            {{ Form::text('marca', $catalogos->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''),  "id" => "marca","name" => "marca"]) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Categoría del producto') }}
            @include('abastecimiento.registros.catalogos.select-categorias-edit')                
            {!! $errors->first('catId', '<div class="invalid-feedback">:message</div>') !!}
          </div> 
       
        <div class="col-lg-6">
            {{ Form::label('Descripción') }}
            @include('abastecimiento.registros.catalogos.select-descripcion-edit')
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Presentación') }}
            {{ Form::text('presentacion', $catalogos->presentacion, ['class' => 'form-control' . ($errors->has('presentacion') ? ' is-invalid' : ''), "id" => "presentacion","name" => "presentacion","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
            {!! $errors->first('presentacion', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Unidad de medida') }}
            {{ Form::text('unidadMedida', $catalogos->unidadMedida, ['class' => 'form-control' . ($errors->has('unidadMedida') ? ' is-invalid' : ''), "id" => "unidadMedida","name" => "unidadMedida","onKeyPress"=> "if(this.value.length==2) return false;"]) }}
            {!! $errors->first('unidadMedida', '<div class="invalid-feedback">:message</div>') !!}
        </div>            

        <div class="col-lg-6">
            {{ Form::label('Empaque') }}
            {{ Form::text('empaque', $catalogos->empaque, ['class' => 'form-control' . ($errors->has('empaque') ? ' is-invalid' : ''), "id" => "empaque","name" => "empaque","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
            {!! $errors->first('empaque', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Costo unitario') }}
            {{ Form::text('costoUnitario', $catalogos->costoUnitario, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario","onKeyPress"=> "if(this.value.length==2) return false;"]) }}
            {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>     
           
          
        </div>
      </div>
    </div>
</div>