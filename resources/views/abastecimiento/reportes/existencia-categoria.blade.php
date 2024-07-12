@extends('theme.team.app')

@section('template_title')
 Reporte de existencia por categoría
@endsection

@section('content')


<section class="content container-fluid">
  <div class="row">
      <div class="col-md-12">
        @includeif('partials.errors')
        <form method="POST" action="{{ route('existencia.categoria.reporte') }}">
            @csrf
            <h4>Reporte de existencia categoría</h4>
            @include('abastecimiento.reportes.form-reporte')

        </form>
         
      </div>
  </div>
</section>


@endsection