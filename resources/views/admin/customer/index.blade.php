@extends('layouts.admin')
@section('title','Gestión de clientes')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Customers') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Customers') }}</li>
            </ol>
        </nav>
    </div>
    @can('customers.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('customers.create') }}">
                    <span class="btn btn-primary">+ {{ __('New Customer') }}</span>
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
                                    <th>{{ __('DNI') }}</th>
                                    <th>{{ __('Telephone / Mobile') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $customer->id }}</th>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->dni }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>     
                                        <form action="{{ route('customers.destroy', $customer) }}" class="frmEliminar" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('customers.show')
                                                <a href="{{ route('customers.show', $customer) }}" title="{{ __('Details') }}">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan
                                            @can('customers.edit')
                                                <a href="{{ route('customers.edit', $customer) }}" title="{{ __('Edit') }}">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            @can('customers.destroy')
                                                <button class="btn btn-outline-danger" type="submit" title="{{ __('Delete') }}">
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
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@if (session('success') == 'ok')
    <script>
        Swal.fire({
            icon: "success",
            title: "El cliente ha sido creado correctamente",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (session('update') == 'ok')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: "success",
            title: "La cliente ha sido actualizado correctamente",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado',
            'El cliente ha sido eliminado',
            'success'
        )
    </script>
@endif
<script>
    $(".table").on("submit", ".frmEliminar", function(e){
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