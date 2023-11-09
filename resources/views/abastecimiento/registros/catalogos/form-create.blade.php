<div class="box box-info padding-1">
    <div class="box-body">

       
          
            <div class="col-lg-6">
                {{ Form::label('Nombre del Catalogo o Sku') }}
                {{ Form::text('marca', null, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''),  "id" => "marca","name" => "marca"]) }}
                {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Categoria del Producto') }}
                @include('abastecimiento.registros.catalogos.select-categorias')                               
                {!! $errors->first('catId', '<div class="invalid-feedback">:message</div>') !!}
              </div> 
              <br>
            <div class="col-lg-6">
                {{ Form::label('Descripcion') }}
                @include('abastecimiento.registros.catalogos.select-tipo')
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Presentacion') }}
                {{ Form::number('presentacion', null, ['class' => 'form-control' . ($errors->has('presentacion') ? ' is-invalid' : ''), "id" => "presentacion","name" => "presentacion","onKeyPress"=> "if(this.value.length==3) return false;"]) }}
                {!! $errors->first('presentacion', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <br>
            <div class="col-lg-6">
                {{ Form::label('Unidad de Medidad') }}
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
                {{ Form::label('Costo Unitario') }}
                {{ Form::number('costoUnitario', null, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''), "id" => "costoUnitario","name" => "costoUnitario","onKeyPress"=> "if(this.value.length==2) return false;"]) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            
            
             
           
          
        </div>
      </div>
    </div>
</div>