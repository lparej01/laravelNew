<div class="box box-info padding-1">
    <div class="box-body">
        <div class="card-body">
            <table class="table" style="width: 300px" >
                <tbody>
                    <thead>
                        <tr>
                        <th>Combo Nro</th>
                        <th>Categoria</th>
                        <th>Nombre del Combo</th>
                        <th>Unidades</th>
                        <th>Peso del Combo</th>
                    </tr>
                    </thead>
                    @foreach ($combos as $item)
                    <tr >
                        <td>{{  $item->comboId }}</td>
                        <td style="width: 50px">{{  $item->categoria }}</td>
                        <td style="width: 50px"> {{  $item->descCombo }}</td>
                        <td>{{  $item->unidades }}</td>
                        <td> {{  $item->peso }} Kg</td>
                    </tr>
                    @endforeach
                </tbody>
            
               </table>
        </div>
     
        <div class="col-lg-6">
            {{ Form::label('Unidades (*)') }}
            {{ Form::text('unidades', null, ['class' => 'form-control' . ($errors->has('unidades') ? ' is-invalid' : ''),  "id" => "unidades","name" => "unidades"]) }}
            {!! $errors->first('unidades', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        
    </div> 
</div>         
            
            
             