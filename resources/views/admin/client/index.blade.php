@extends('layouts.admin')
@section('title','Gestión de clientes')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col mb-1">
            <a href="{{route('clients.create')}}" class="nav-link">
                <span class="btn btn-primary">+ Nuevo Cliente</span>
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
                                    <th>DNI</th>
                                    <th>Teléfono / Celular</th>
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>
                                        <a href="{{route('clients.show',$client)}}">{{$client->name}}</a>
                                    </td>
                                    <td>{{$client->dni}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->email}}</td>
                                    <td style="width: 50px;">
                                        
                                        <form action="{{route('clients.destroy', $client)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('clients.edit', $client)}}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            
                                            <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
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