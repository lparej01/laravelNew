<div class="box box-info padding-1">
    <div class="box-body">      
          
            <div class="col-lg-6">
                {{ Form::label('Nombre del cátalogo ó sku') }}
                {{ Form::text('marca', null, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''),  "id" => "marca","name" => "marca"]) }}
                {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Categoría del producto') }}
                @include('abastecimiento.registros.catalogos.select-categorias')                               
                {!! $errors->first('catId', '<div class="invalid-feedback">:message</div>') !!}
              </div> 
              <br>
            <div class="col-lg-6">
                {{ Form::label('Descripción') }}
                @include('abastecimiento.registros.catalogos.select-tipo')
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Presentación') }}
                {{ Form::number('presentacion', null, ['class' => 'form-control' . ($errors->has('presentacion') ? ' is-invalid' : ''), "id" => "presentacion","name" => "presentacion","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
                {!! $errors->first('presentacion', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Unidad de medida') }}
                @include('abastecimiento.registros.catalogos.select-sku')
                {!! $errors->first('unidadMedida', '<div class="invalid-feedback">:message</div>') !!}
            </div>            
            <br>
            <div class="col-lg-6">
                {{ Form::label('Empaque') }}
                {{ Form::number('empaque', null, ['class' => 'form-control' . ($errors->has('empaque') ? ' is-invalid' : ''), "id" => "empaque","name" => "empaque","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
                {!! $errors->first('empaque', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Costo unitario') }}
                {{ Form::number('costoUnitario', null, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario","onKeyPress"=> "if(this.value.length==2) return false;"]) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            
            
             
           
          
        </div>
      </div>
    </div>
</div>