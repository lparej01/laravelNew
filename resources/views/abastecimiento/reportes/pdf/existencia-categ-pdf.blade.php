<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/team/img/apple-icon.png")}}">
  <link rel="icon"  href="{{asset("assets/team/img/la-giralda.png")}}" class="rounded">
  <title>
    Agrícola Santa Cruz
  </title>
  <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"   type="text/css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
    @page {
        margin: 0cm 0cm;
        font-family: Arial;
    }

    body {
        margin: 3cm 2cm 2cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #2a0927;
        color: white;
        text-align: center;
        line-height: 30px;
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #2a0927;
        color: white;
        text-align: center;
        line-height: 35px;
    }
</style>
</head>

<body>

  <div class="container-fluid py-4">
   
    <table>
      <tr>
          <td>
            <img src="{{ asset('assets/team/img/la-giralda.png') }}"  width="100px" height="100px"  >
          </td>
          </td>
          <h3>Reporte de existencia por Categorias  </h3>
          </td>
      </tr>
    </table>  
    
  </div>
  <div class="container-fluid py-4">
    <header>
      <h2>Existencia de productos según su categoría</h2>
      
    </header>
    <h4>Periodo: {{$existencia[0]->periodo}}</h4>
  </div>
  <main>
    <table class="table table-striped table-hover" border="1px">
      <thead style="background-color: rgb(210, 198, 30)">
          <tr>
          <td>Id</td>
          <td>Categorías</td>
          {{-- <td>Periodo</td> --}}
          <td>Inv.Inicial</td>
          <td>Entradas</td>
          <td>Salidas</td>
          <td>Merma</td>
          <td>Inv. Final</td>
      </tr>
      </thead>
      <tbody>
          @foreach ($existencia as $item)
              <tr><td>{{$item->catId}}</td>
                  <td>{{$item->categoria}}</td>
                  {{-- <td>{{$item->periodo}}</td> --}}
                  <td style="width: 70px">{{$item->invInicial}}</td>
                  <td style="width: 60px" >{{$item->entradas}}</td>
                  <td style="width: 60px" >{{$item->salidas}}</td>
                  <td style="width: 60px" >{{$item->merma}}</td>
                  <td style="width: 60px">{{$item->invFinal}}</td>
              </tr>
          @endforeach                           
      </tbody>

  </table>    

  </main>
  
  <footer>
      <h1>La Giralda Santa Cruz</h1>
  </footer>
   
  </div>

 
  
</body>

</html>