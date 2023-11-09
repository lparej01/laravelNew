<div class="box box-info padding-1">
    <div class="box-body">
          
            <div class="col-lg-6">
                {{ Form::label('Nombre del pedido') }}
                {{ Form::text('Nombre del Pedido', $pedidos->pedidoId, ['class' => 'form-control' . ($errors->has('pedidoId') ? ' is-invalid' : ''),  "id" => "pedidoId","name" => "pedidoId",'readonly']) }}
                {!! $errors->first('pedidoId', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Fecha del Pedido') }}
                {{ Form::text('fechaPedido', $pedidos->fechaPedido, ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''),  "id" => "fechaPedido","name" => "fechaPedido",'readonly']) }}
                {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Proveedor') }}
                {{ Form::text('nombre', $pedidos->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), "id" => "nombre","name" => "nombre",'readonly']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Catalogo') }}
                {{ Form::text('marca', $pedidos->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), "id" => "marca","name" => "marca"]) }}
                {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Cantidad') }}
                {{ Form::number('cant', $pedidos->cant, ['class' => 'form-control' . ($errors->has('cant') ? ' is-invalid' : ''), "id" => "cant","name" => "cant","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('cant', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
            <div class="col-lg-6">
                {{ Form::label('Flete') }}
                {{ Form::number('flete', $pedidos->flete, ['class' => 'form-control' . ($errors->has('flete') ? ' is-invalid' : ''), "id" => "flete","name" => "flete","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
                {!! $errors->first('flete', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-lg-6">
                {{ Form::label('Total con Flete') }}
                {{ Form::number('costoTotalFlete', $pedidos->costoTotalFlete, ['class' => 'form-control' . ($errors->has('costoTotalFlete') ? ' is-invalid' : ''), "id" => "costoTotalFlete","name" => "costoTotalFlete","onKeyPress"=> "if(this.value.length==12) return false;",'readonly']) }}
                {!! $errors->first('costoTotalFlete', '<div class="invalid-feedback">:message</div>') !!}
            </div>  
            
           
             
           
          
        </div>
      </div>
    </div>
</div>