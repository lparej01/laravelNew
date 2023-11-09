<div class="box box-info padding-1">
    <div class="box-body">

       
            <div class="col-lg-6">
                {{ Form::label('Categoria') }}
                {{ Form::text('categoria', $categorias->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''),  "id" => "categoria","name" => "categoria"]) }}
                {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Costo unitario') }}
                {{ Form::number('costoUnitario', $categorias->costoUnitario, ['class' => 'form-control' . ($errors->has('costoUnitario') ? ' is-invalid' : ''),  "id" => "costoUnitario","name" => "costoUnitario","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('costoUnitario', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Precio') }}
                {{ Form::number('precio', $categorias->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), "id" => "precio","name" => "precio", "onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Peso') }}
                {{ Form::number('peso', $categorias->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), "id" => "peso","name" => "peso","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            
            <div class="col-lg-6">
               
                {{ Form::hidden('id', $categorias->catId, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''),"id" => "CatId"]) }}
                
            </div>
             
           
          
        </div>
      </div>
    </div>
</div>