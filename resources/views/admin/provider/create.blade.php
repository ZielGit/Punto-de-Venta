@extends('layouts.admin')
@section('title','Registrar de Proveedores')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Register Providers') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">{{ __('Providers') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Register Providers') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ __('Register Providers') }}</h4>
                    </div>
                    <form action="{{route('providers.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="ejemplo@gmail.com">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ruc_number">{{ __('RUC Number') }}</label>
                            <input type="number" class="form-control" name="ruc_number" id="ruc_number" value="{{old('ruc_number')}}">
                            @error('ruc_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('Telephone / Mobile') }}</label>
                            <input type="number" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Register') }}</button>
                        <a href="{{route('providers.index')}}" class="btn btn-light">
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
@endsection