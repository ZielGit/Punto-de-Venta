@extends('layouts.admin')
@section('title','Gestión de roles del sistema')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('System roles') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Roles') }}</li>
            </ol>
        </nav>
    </div>

    @can('roles.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{route('roles.create')}}">
                    <span class="btn btn-primary">+ {{ __('New Role') }}</span>
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
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <form action="{{route('roles.destroy', $role)}}" class="frmEliminar" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('roles.show')
                                                <a href="{{route('roles.show', $role)}}" title="{{ __('Details') }}">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan
                                            @can('roles.edit')
                                                <a href="{{route('roles.edit', $role)}}" title="{{ __('Edit') }}">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            @can('roles.destroy')
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
<script src="{{asset('melody/js/data-table.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado',
            'El rol ha sido eliminado',
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