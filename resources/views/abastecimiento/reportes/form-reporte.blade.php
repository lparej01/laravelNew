
<div class="col-lg-6">   
      <div class="input-group mb-3">
        <input type="text"  maxlength="6" class="form-control" placeholder="Periodo <AAAAMM>"  aria-label="Periodo <AAAAMM>" title="No puede ser mayor al periodo activo" aria-describedby="button-addon2" name="fechaPeriodo" id="fechaPeriodo">
         
         <button class="btn btn-primary"   type="submit" id="button-addon2">Generar Reporte</button>  
        
      </div>         
      {!! $errors->first('fechaPeriodo', '<div class="alert alert-primary">:message</div>') !!}
</div>
   
