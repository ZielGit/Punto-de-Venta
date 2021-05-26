@extends('layouts.admin')
@section('title','Editar Proveedor')
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar Proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Proveedor</h4>
                    </div>
                    {{-- revisar request - problemas al actulizar --}}
                    <form action="{{route('providers.update', $provider)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$provider->name}}" aria-describedby="helpId">
                            @error('name')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
      
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$provider->mail}}" placeholder="ejemplo@gmail.com">
                            @error('email')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
      
                        <div class="form-group">
                            <label for="ruc_number">Numero de RUC</label>
                            <input type="number" class="form-control" name="ruc_number" id="ruc_number" value="{{$provider->ruc_number}}" aria-describedby="helpId">
                            @error('ruc_number')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
      
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$provider->address}}" aria-describedby="helpId">
                            @error('address')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
      
                        <div class="form-group">
                            <label for="phone">Numero de contacto</label>
                            <input type="number" class="form-control" name="phone" id="phone" value="{{$provider->phone}}" aria-describedby="helpId">
                            @error('phone')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('providers.index')}}" class="btn btn-light">
                            Cancelar
                        </a>
                    </form>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection