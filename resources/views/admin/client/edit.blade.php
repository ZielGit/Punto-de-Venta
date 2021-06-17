@extends('layouts.admin')
@section('title','Editar cliente')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de cliente</h4>
                    </div>
                    <form action="{{route('clients.update', $client)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name',$client->name)}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {{-- {!! $errors->first('name', '<small>:message</small>') !!} --}}
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="number" class="form-control" name="dni" id="dni" value="{{old('dni',$client->dni)}}">
                            @error('dni')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input type="number" class="form-control" name="ruc" id="ruc" value="{{old('ruc',$client->ruc)}}" aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                            @error('ruc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{old('address',$client->address)}}" aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono \ Celular</label>
                            <input type="number" class="form-control" name="phone" id="phone" value="{{old('phone',$client->phone)}}" aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{old('email',$client->email)}}" aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
                        <a href="{{route('clients.index')}}" class="btn btn-light">
                            Cancelar
                        </a>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection