@extends('layouts.admin')
@section('title','Gestión de compras')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>

    @can('purchases.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{route('purchases.create')}}">
                    <span class="btn btn-primary">+ Nueva Compra</span>
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
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">{{$purchase->id}}</th>
                                    <td>
                                        {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$purchase->total}}</td>

                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.purchases', $purchase)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.purchases', $purchase)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    
                                    <td>
                                        @can('purchases.pdf')
                                            <a href="{{route('purchases.pdf', $purchase)}}" title="Pdf">
                                                <span class="btn btn-outline-primary"><i class="far fa-file-pdf"></i></span>
                                            </a>
                                        @endcan
                                        @can('purchases.show')
                                            <a href="{{route('purchases.show', $purchase)}}" title="Detalles">
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