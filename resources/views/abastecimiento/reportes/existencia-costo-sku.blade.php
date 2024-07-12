@extends('theme.team.app')

@section('template_title')
   Reporte de sku costo 
@endsection

@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <form method="POST" action="{{ route('existencia.costo.sku.reporte') }}">
                @csrf
                <h4>Reporte de existencia costo sku</h4>
                @include('abastecimiento.reportes.form-reporte')
    
            </form>
        </div>
    </div>
</section>


@endsection