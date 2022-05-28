@extends('layouts.admin')
@section('title') {{ __('Product Information') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ $product->name }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{ asset('image/'.$product->image) }}" alt="profile" class="img-lg  mb-3" />
                                <h3>{{ $product->name }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                             <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        {{ __('About the product') }}
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">
                                        {{ __('Products') }}
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">
                                        {{ __('Product Registration') }}
                                    </button>
                                </div>
                            </div> 

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        {{ __('Status') }}
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $product->status }}
                                    </span>
                                </p>
                                {{-- pensar en los permisos, editar despues --}}
                                <p class="clearfix">
                                    <span class="float-left">
                                        {{ __('Provider') }}
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{ route('providers.show', $product->provider->id) }}">
                                        {{ $product->provider->name }}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        {{ __('Category') }}
                                    </span>
                                    <span class="float-right text-muted">
                                        {{--  PRODUCTOS POR CATEGORIA  --}}
                                        <a href="{{ route('categories.show', $product->category->id) }}">
                                            {{ $product->category->name }}
                                        </a>
                                    </span>
                                </p>
                                
                            </div>

                            @if ($product->status == 'ACTIVE')
                                <a href="{{ route('change.status.products', $product) }}" class="btn btn-success btn-block">{{ __('Active') }}</a>
                            @else
                                <a href="{{ route('change.status.products', $product) }}" class="btn btn-danger btn-block">{{ __('Disabled') }}</a>
                            @endif
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>{{ __('Product information') }}</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> {{ __('Code') }}</strong>
                                        <p class="text-muted">
                                            {{ $product->code }}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> {{ __('Stock') }}</strong>
                                        <p class="text-muted">
                                            {{ $product->stock }}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-mobile mr-1"></i> {{ __('Sale price') }}</strong>
                                        <p class="text-muted">
                                            {{ $product->sell_price }}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i> {{ __('Barcode') }}</strong>
                                        <p class="text-muted">
                                            {!! DNS1D::getBarcodeHTML($product->code, 'EAN13'); !!}
                                        </p>
                                        
                                        <hr> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('products.index') }}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
@endsection