@extends('theme.team.app')

@section('template_title')
   Reporte de existencia categoría
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Reporte de existencia por costo categorías</h4>
                    <form action="{{ route('exist.costo.cat.pdf')}}"  method="POST">
                        @csrf
                        <input  type="hidden" name="rpte" class="form-control" value="{{$existencia[0]->periodo}}">
                        @include('include.button-pdf')
                    </form>
                      
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <td>Id</td>
                            <td>Categoría</td>
                            <td>Periodo</td>                          
                            <td>Existencia</td>
                            <td>Costo total</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($existencia as $item)
                                <tr><td>{{$item->catId}}</td>
                                    <td>{{$item->categoria}}</td>
                                    <td>{{$item->periodo}}</td>                                    
                                    <td>{{$item->invFinal}}</td>
                                    <td>{{$item->costoUnitario}}</td>
                                </tr>
                            @endforeach                           
                        </tbody>

                    </table>
                   

                </div>
            </div>
</section>

@endsection