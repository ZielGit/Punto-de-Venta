@extends('layouts.admin')
@section('title') {{ __('Edit Product') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Product Edition') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Product Edition') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$product->name) }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">{{ __('Barcode') }}</label>
                            <input type="text" name="code" id="code" class="form-control" aria-describedby="helpId" value="{{ old('code',$product->code) }}">
                            <small id="helpId" class="form-text text-muted">{{ __('Optional field') }}</small>
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sell_price">{{ __('Sale price') }}</label>
                            <input type="number" name="sell_price" id="sell_price" class="form-control" min="0" step="any" value="{{ old('sell_price',$product->sell_price) }}">
                            @error('sell_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select class="form-control" name="category_id" id="category_id">
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}" 
                                  @if ($category->id == $product->category_id)
                                  selected
                                  @endif
                                  >{{ $category->name }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="provider_id">{{ __('Provider') }}</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $product)
                                <option value="{{ $product->id }}"
                                  @if ($product->id == $product->provider_id)
                                  selected
                                  @endif
                                  >{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('provider_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <h4 class="card-title d-flex">{{ __('Product Picture') }}
                            <small class="ml-auto align-self-end">
                                <a href="dropify.html" class="font-weight-light" target="_blank">{{ __('Select a File') }}</a>
                            </small>
                            </h4>
                            <input type="file"  name="image" id="image" class="dropify" />
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Edit') }}</button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">
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
<script src="{{ asset('melody/js/dropify.js') }}"></script>
@endsection