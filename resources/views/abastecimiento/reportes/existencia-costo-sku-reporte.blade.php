@extends('theme.team.app')

@section('template_title')
   Reporte de existencía sku
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Reporte  de existencia por costo sku</h4>
                    <form action="{{ route('exist.costo.sku.pdf')}}"  method="POST">
                        @csrf
                        <input  type="hidden" name="rpte" class="form-control" value="{{$existencia[0]->periodo}}">
                        @include('include.button-pdf')
                    </form>
                      
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <td>Sku</td>
                            <td>Descripción</td>
                            <td>Periodo</td>                          
                            <td>Existencia</td>
                            <td>Costo unitario</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($existencia as $item)
                                <tr><td>{{$item->sku}}</td>
                                    <td>{{$item->descripcion}}</td>
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