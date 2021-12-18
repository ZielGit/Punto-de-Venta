@extends('layouts.admin')
@section('title','Gestión de ventas')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Sales') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Sales') }}</li>
            </ol>
        </nav>
    </div>
    
    @can('sales.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{route('sales.create')}}">
                    <span class="btn btn-primary">+ {{ __('New Sale') }}</span>
                </a>
            </div>
        </div>
    @endcan

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Total') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Actions') }}</th>
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
                                    
                                    @if ($sale->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.sales', $sale)}}" title="{{ __('Edit') }}">
                                            {{ __('Active') }} <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.sales', $sale)}}" title="{{ __('Edit') }}">
                                            {{ __('Cancelled') }} <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif

                                    <td>
                                        @can('sales.pdf')
                                            <a href="{{route('sales.pdf', $sale)}}" title="{{ __('Pdf') }}">
                                                <span class="btn btn-outline-primary"><i class="far fa-file-pdf"></i></span>
                                            </a>
                                        @endcan
                                        
                                        @can('sales.print')
                                            <a href="{{route('sales.print', $sale)}}" title="{{ __('Print') }}">
                                                <span class="btn btn-outline-warning"><i class="fas fa-print"></i></span>
                                            </a>
                                        @endcan
                                        
                                        @can('sales.show')
                                            <a href="{{route('sales.show', $sale)}}" title="{{ __('Details') }}">
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
<script src="{{asset('melody/js/data-table.js')}}"></script>
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