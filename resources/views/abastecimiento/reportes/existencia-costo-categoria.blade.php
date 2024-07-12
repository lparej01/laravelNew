@extends('theme.team.app')

@section('template_title')
   Reporte de existencia costo
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <form method="POST" action="{{ route('existencia.costo.categoria.reporte') }}">
                @csrf
                <h4>Reporte de existencia costo categoría</h4>
                @include('abastecimiento.reportes.form-reporte')
    
            </form>
        </div>
    </div>
</section>


@endsection