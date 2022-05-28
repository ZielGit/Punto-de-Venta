@extends('layouts.admin')
@section('title') {{ __('Edit Customer') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Customer Edition') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">{{ __('Customers') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Customer Edition') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$customer->name) }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    {{-- {!! $errors->first('name', '<small>:message</small>') !!} --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dni">{{ __('DNI') }}</label>
                                    <input type="number" class="form-control" name="dni" id="dni" value="{{ old('dni',$customer->dni) }}">
                                    @error('dni')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ruc">{{ __('RUC') }}</label>
                                    <input type="number" class="form-control" name="ruc" id="ruc" value="{{ old('ruc',$customer->ruc) }}" aria-describedby="helpId">
                                    <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('ruc')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address',$customer->address) }}" aria-describedby="helpId">
                                    <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('Telephone / Mobile') }}</label>
                                    <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone',$customer->phone) }}" aria-describedby="helpId">
                                    <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email',$customer->email) }}" aria-describedby="helpId">
                                    <small id="helpId" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Edit') }}</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-light">
                            {{ __('Cancel') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection