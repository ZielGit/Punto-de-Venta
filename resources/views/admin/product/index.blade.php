@extends('layouts.admin')
@section('title','Gestión de productos')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Products') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Products') }}</li>
            </ol>
        </nav>
    </div>

    @can('products.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{route('products.create')}}">
                    <span class="btn btn-primary">+ {{ __('New Product') }}</span>
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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Stock') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->stock}}</td>

                                    @if ($product->status == 'ACTIVE')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}" title="{{ __('Edit') }}">
                                            {{ __('Active') }} <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}" title="{{ __('Edit') }}">
                                            {{ __('Disable') }} <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif

                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        <form action="{{route('products.destroy', $product)}}" class="frmEliminar" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('products.show')
                                                <a href="{{route('products.show', $product)}}" title="{{ __('Details') }}">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan
                                            @can('products.edit')
                                                <a href="{{route('products.edit', $product)}}" title="{{ __('Edit') }}">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            @can('products.destroy')
                                                <button class="btn btn-outline-danger" type="submit" title="{{ __('Eliminar') }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            @endcan
                                        </form>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado',
            'El producto ha sido eliminado',
            'success'
        )
    </script>
@endif
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

    $('.frmEliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title:'¿Estas Seguro?',
            text:'¡No podrás revertir esto!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, bórralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) =>{
            if(result.value){
                this.submit();
            }
        })
    })
</script>
@endsection