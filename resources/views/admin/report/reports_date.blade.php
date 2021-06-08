@extends('layouts.admin')
@section('title','Reporte por rango de fecha')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Reporte por rango de fecha
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte por rango de fecha</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    {!! Form::open(['route'=>'report.results', 'method'=>'POST']) !!}
                    <div class="row ">
            
                        <div class="col-12 col-md-3">
                            <span>Fecha inicial</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_ini')}}" 
                                name="fecha_ini" id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_fin')}}" 
                                name="fecha_fin" id="fecha_fin">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center mt-4">
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-3 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>s/ {{$total}}</strong>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row">{{$sale->id}}</th>
                                    <td>
                                        {{\Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$sale->total}}</td>
                                    <td>{{$sale->status}}</td>
                                    <td>
                                        @can('sales.pdf')
                                            <a href="{{route('sales.pdf', $sale)}}" title="Pdf">
                                                <span class="btn btn-outline-primary"><i class="far fa-file-pdf"></i></span>
                                            </a>
                                        @endcan
                                        @can('sales.print')
                                            <a href="{{route('sales.print', $sale)}}" title="Imprimir">
                                                <span class="btn btn-outline-warning"><i class="fas fa-print"></i></span>
                                            </a>
                                        @endcan
                                        @can('sales.show')
                                            <a href="{{route('sales.show', $sale)}}" title="Detalles">
                                                <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
<script>
    window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
      }
</script>
<script>
    $('#dataTable').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    } );
</script>
@endsection