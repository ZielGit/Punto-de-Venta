@extends('layouts.admin')
@section('title','Editar producto')
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de Productos</h4>
                    </div>

                    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control" aria-describedby="helpId" required>
                            @error('name')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
      
                        {{-- <div class="form-group">
                            <label for="code">Código de barras</label>
                            <input type="text" name="code" id="code" value="{{$product->code}}" class="form-control">
                            <small id="helpId" class="text-muted">Campo opcional</small>
                        </div> --}}
      
                        <div class="form-group">
                            <label for="sell_price">Precio de venta</label>
                            <input type="number" name="sell_price" id="sell_price" value="{{$product->sell_price}}" class="form-control" aria-describedby="helpId" required>
                            @error('sell_price')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select class="form-control" name="category_id" id="category_id">
                              @foreach ($categories as $category)
                              <option value="{{$category->id}}" 
                                  @if ($category->id == $product->category_id)
                                  selected
                                  @endif
                                  >{{$category->name}}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
      
                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $product)
                                <option value="{{$product->id}}"
                                  @if ($product->id == $product->provider_id)
                                  selected
                                  @endif
                                  >{{$product->name}}</option>
                                @endforeach
                            </select>
                            @error('provider_id')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                         
                        <div class="card-body">
                            <h4 class="card-title d-flex">Imagen de producto
                            <small class="ml-auto align-self-end">
                                <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                            </small>
                            </h4>
                            <input type="file"  name="picture" id="picture" class="dropify" />
                        </div>
      
                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
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
<script src="{{asset('melody/js/dropify.js')}}"></script>
@endsection