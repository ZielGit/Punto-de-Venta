@extends('layouts.admin')
@section('title','Registrar producto')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Product Registration') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{ __('Products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Product Registration') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ __('Product Registration') }}</h4>
                    </div>
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">{{ __('Barcode') }}</label>
                            <input type="text" name="code" id="code" class="form-control" aria-describedby="helpId" value="{{old('code')}}">
                            <small id="helpId" class="form-text text-muted">{{ __('Optional field') }}</small>
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sell_price">{{ __('Sale price') }}</label>
                            <input type="number" name="sell_price" id="sell_price" class="form-control" value="{{old('sell_price')}}">
                            @error('sell_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provider_id">{{ __('Provider') }}</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-body">
                            <h4 class="card-title d-flex">{{ __('Product Picture') }}
                            <small class="ml-auto align-self-end">
                                <a href="dropify.html" class="font-weight-light" target="_blank">{{ __('Select a File') }}</a>
                            </small>
                            </h4>
                            <input type="file"  name="picture" id="picture" class="dropify" />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ __('To Register') }}</button>
                        <a href="{{route('products.index')}}" class="btn btn-light">
                            {{ __('Cancel') }}
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