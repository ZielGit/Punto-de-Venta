@extends('layouts.admin')
@section('title','Gestión de roles del sistema')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Roles del sistema
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles del sistema</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col mb-2">
            <a href="{{route('roles.create')}}">
                <span class="btn btn-primary">+ Nuevo Rol</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>
                                        <a href="{{route('roles.show',$role)}}">{{$role->name}}</a>
                                    </td>
                                    
                                    <td>
                                        <form action="{{route('roles.destroy', $role)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('roles.edit', $role)}}" title="Editar">
                                                <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                            </a>
                                            
                                            <button class="btn btn-outline-danger" type="submit" title="Eliminar">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
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
@endsection