@extends('layouts.admin')
@section('title') {{ __('Providers Registration') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Register Provider') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('providers.index') }}">{{ __('Providers') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Register Provider') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('providers.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ruc_number">{{ __('RUC Number') }}</label>
                                    <input type="number" class="form-control" name="ruc_number" id="ruc_number" value="{{ old('ruc_number') }}">
                                    @error('ruc_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpEmail" value="{{ old('email') }}" placeholder="ejemplo@gmail.com">
                                    <small id="helpEmail" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text" class="form-control" name="address" id="address" aria-describedby="helpAddress" value="{{ old('address') }}">
                                    <small id="helpAddress" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('Telephone / Mobile') }}</label>
                                    <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpPhone" value="{{ old('phone') }}">
                                    <small id="helpPhone" class="form-text text-muted">{{ __('This is an optional field.') }}</small>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ __('To Register') }}</button>
                        <a href="{{ route('providers.index') }}" class="btn btn-light">
                            {{ __('Cancel') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection