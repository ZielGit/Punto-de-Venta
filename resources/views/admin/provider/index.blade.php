@extends('layouts.admin')
@section('title','Gestión de Proveedores')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
            </ol>
        </nav>
    </div>

    @can('providers.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{route('providers.create')}}">
                    <span class="btn btn-primary">+ Nuevo Proveedor</span>
                </a>
            </div>
        </div>
    @endcan

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
                                    <th>Correo Electronico</th>
                                    <th>Celular</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <th scope="row">{{$provider->id}}</th>
                                    <td>{{$provider->name}}</td>
                                    <td>{{$provider->email}}</td>
                                    <td>{{$provider->phone}}</td>
                                    <td>
                                        <form action="{{ route('providers.destroy', $provider) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            @can('providers.show')
                                                <a href="{{route('providers.show', $provider)}}" title="Detalles">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan

                                            @can('providers.edit')
                                                <a href="{{route('providers.edit', $provider)}}" title="Editar">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            
                                            @can('providers.destroy')
                                                <button class="btn btn-outline-danger" type="submit" title="Eliminar">
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
@endsection