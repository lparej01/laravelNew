<div class="box box-info padding-1">
    <div class="box-body">
       
        <p">Nro de Combo :{{$combos->comboId}}</p>
        <p >Nombre del Combo :{{$combos->descCombo}}</p>
     
        <div class="card-body">
            <table class="table table-striped" style="width: 300px" >
                <tbody>
                    <thead>
                        <tr>
                        
                        <th>Productos</th>                       
                        <th>Unidades</th>
                     
                    </tr>
                    </thead>
                    @foreach ($combos1 as $item)
                    <tr>                       
                        <td style="width: 50px">{{  $item->categoria }}</td>                        
                        <td>{{  $item->unidades }}</td>
               
                    </tr>
                    @endforeach
                </tbody>
            
               </table>
               <h5>Peso total del combo :{{$combos->peso}}Kg</h5>
        </div>
        
        <div class="col-lg-6">
            {{ Form::label('Tipo de Plan (*)') }}
            <select name="tipoPlan" id="tipoPlan" class="form-select @error('tipoPlan') is-invalid @enderror" >
                <option value="">Seleccione tipo de plan</option>               
                <option value="Produccion">Produccion</option>
                <option value="Entrega">Entrega</option>               
            
            </select>
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Fecha tipo plan (*)') }}
            {{ Form::date('fechaPlan', null, ['class' => 'form-control' . ($errors->has('fechaPlan') ? ' is-invalid' : ''),  "id" => "fechaPlan","name" => "fechaPlan"]) }}
            {!! $errors->first('fechaPlan', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        <div class="col-lg-6">
            {{ Form::label('Unidades (*)') }}
            {{ Form::text('unidades', null, ['class' => 'form-control' . ($errors->has('unidades') ? ' is-invalid' : ''),  "id" => "unidades","name" => "unidades"]) }}
            {!! $errors->first('unidades', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        
    </div> 
</div>         
            
            
             