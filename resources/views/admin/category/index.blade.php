@extends('layouts.admin')
@section('title','Gestión de Categorias')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Categories') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Categories') }}</li>
            </ol>
        </nav>
    </div>
    @can('categories.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('categories.create') }}">
                    <span class="btn btn-primary">+ {{ __('New Category') }}</span>
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
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category) }}" class="frmEliminar" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('categories.show')
                                                <a href="{{ route('categories.show', $category) }}" title="{{ __('Details') }}">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan
                                            @can('categories.edit')
                                                <a href="{{ route('categories.edit', $category) }}" title="{{ __('Edit') }}">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            @can('categories.destroy')
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
            title: "La categoría ha sido creada correctamente",
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
            title: "La categoría ha sido actualizada correctamente",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado',
            'La categoría ha sido eliminado',
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