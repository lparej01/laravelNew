@extends('theme.team.app')

@section('template_title')
   Reporte de existencia categoría
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Reporte de existencia por sku</h4>
                    <form action="{{ route('exist.sku.pdf')}}"  method="POST">
                        @csrf
                        <input  type="hidden" name="rpte" class="form-control" value="{{$existencia[0]->periodo}}">
                        @include('include.button-pdf')
                    </form>
                      
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <td><B>Id</B></td>
                            <td><B>Sku</B></td>
                            <td><B>Periodo</B></td>
                            <td><B>Inv.Inicial</B></td>
                            <td><B>Entradas</B></td>
                            <td><B>Salidas</B></td>
                            <td><B>Merma</B></td>
                            <td><B>Inv. Final</B></td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($existencia as $item)
                                <tr><td>{{$item->sku}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->periodo}}</td>
                                    <td>{{$item->invInicial}}</td>
                                    <td>{{$item->entradas}}</td>
                                    <td>{{$item->salidas}}</td>
                                    <td>{{$item->merma}}</td>
                                    <td>{{$item->invFinal}}</td>
                                </tr>
                            @endforeach  
                            <tr><td></td>
                                <td></td>
                                <td></td>
                                <td>Totales </td>
                                <td style=""><b>{{number_format($exist->entradas,0, ",", ".")}}</b></td>
                                <td><b>{{number_format($exist->salidas,0, ",", ".")}}</b></td>
                                <td></td>
                                <td></td>
                            </tr>                                     
                        </tbody>

                    </table>
                   

                </div>
            </div>
</section>

@endsection