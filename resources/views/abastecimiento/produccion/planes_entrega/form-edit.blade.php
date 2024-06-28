<div class="d-flex flex-column gap-4  p-3 m-3">

    <H4>Reporte de planes de entrega</H4>
    <div class="col-lg-6">
               
        {{ Form::hidden('planId', $planid->planId , ['class' => 'form-control' . ($errors->has('planId') ? ' is-invalid' : ''),"planId" => "CatId"]) }}
        
    </div>
   
    <div class="d-flex justify-content-between">
        <strong>Plan: {{ $planid->planId }} </strong>
        
    </div>
    
    <div class="d-flex " style="align-self: flex-start">
        <strong>Combo: {{ $planid->comboPlanId }}</strong>
       
    </div>
    <div class="d-flex " style="align-self: flex-start">
        <strong>Combo: {{ $planid->descCombo }}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <div class="col-lg-6">
            <div class="d-flex " style="align-self: flex-start">
                <strong>Cantidad de Combos</strong>
               
            </div>
            {{ Form::number('cantidadSolicitada', $planid->cantCombosPlan, ['class' => 'form-control' . ($errors->has('cantidadSolicitada') ? ' is-invalid' : ''), "id" => "cantidadSolicitada","name" => "cantidadSolicitada","onKeyPress"=> "if(this.value.length==12) return false;"]) }}
            {!! $errors->first('cantidadSolicitada', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
    </div>
   
    
</div>