@extends('layouts.admin')
@section('title','información del proveedor')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$provider->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li> 
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">{{ __('Providers') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$provider->name}}</li>
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
                                <h3>{{$provider->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        {{ __('About provider') }}
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">
                                        {{ __('Products') }}
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">
                                        {{ __('Register product') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>{{ __('Provider Information') }}</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> {{ __('Name') }}</strong>
                                        <p class="text-muted">
                                            {{$provider->name}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i> {{ __('RUC Number') }}</strong>
                                        <p class="text-muted">
                                            {{$provider->ruc_number}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-mobile mr-1"></i> {{ __('Telephone / Mobile') }}</strong>
                                        <p class="text-muted">
                                            {{$provider->phone}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i> {{ __('Email') }}</strong>
                                        <p class="text-muted">
                                            {{$provider->email}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-map-marked-alt mr-1"></i> {{ __('Address') }}</strong>
                                        <p class="text-muted">
                                            {{$provider->address}}
                                        </p>
                                        <hr>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('providers.index')}}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('melody/js/profile-demo.js')}}"></script>
<script src="{{asset('melody/js/data-table.js')}}"></script>
@endsection