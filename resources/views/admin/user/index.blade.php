@extends('layouts.admin')
@section('title') {{ __('User Management') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('System Users') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
            </ol>
        </nav>
    </div>
    @can('users.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('users.create') }}">
                    <span class="btn btn-primary">+ {{ __('New User') }}</span>
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
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user) }}" class="frmEliminar" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('users.show')
                                                <a href="{{ route('users.show', $user) }}" title="{{ __('Details') }}">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan
                                            @can('users.edit')
                                                <a href="{{ route('users.edit', $user) }}" title="{{ __('Edit') }}">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            @can('users.destroy')
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
            title: "El usuario ha sido creado correctamente",
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
            title: "El usuario ha sido actualizado correctamente",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado',
            'El usuario ha sido eliminado',
            'success'
        )
    </script>
@endif
<script>
    $(".table").on("submit", ".frmEliminar", function(e){
        e.preventDefault();
        Swal.fire({
            title:'??Estas Seguro?',
            text:'??No podr??s revertir esto!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '??Si, b??rralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) =>{
            if(result.value){
                this.submit();
            }
        })
    })
</script>
@endsection