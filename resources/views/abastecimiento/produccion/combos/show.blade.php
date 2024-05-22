

   
   
   <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <table class="table table-striped" style="width: 300px" >
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
  </div>
   
   
   
   
   
   
   
   
   
