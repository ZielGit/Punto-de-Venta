@extends('layouts.admin')
@section('title','Registrar producto')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de productos</h4>
                    </div>

                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId" required>
                            @error('name')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">Código de barras</label>
                            <input type="text" name="code" id="code" class="form-control">
                            <small id="helpId" class="text-muted">Campo opcional</small>
                            @error('code')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sell_price">Precio de venta</label>
                            <input type="number" name="sell_price" id="sell_price" class="form-control" aria-describedby="helpId" required>
                            @error('sell_price')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                            @foreach ($providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="card-body">
                            <h4 class="card-title d-flex">Imagen de producto
                            <small class="ml-auto align-self-end">
                                <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                            </small>
                            </h4>
                            <input type="file"  name="picture" id="picture" class="dropify" />
                            @error('picture')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('products.index')}}" class="btn btn-light">
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
<script src="{{asset('melody/js/data-table.js')}}"></script>
<script src="{{asset('melody/js/dropify.js')}}"></script>
@endsection