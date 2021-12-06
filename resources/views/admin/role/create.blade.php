@extends('layouts.admin')
@section('title','Registro de rol')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Role register') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{ __('Roles') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Role register') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ __('Role register') }}</h4>
                    </div>
                    {{-- {!! Form::open(['route'=>'roles.store', 'method'=>'POST']) !!} --}}
                    <form action="{{route('roles.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @include('admin.role._form')
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Register') }}</button>
                        <a href="{{route('roles.index')}}" class="btn btn-light">
                            {{ __('Cancel') }}
                        </a>
                    </form>
                     {{-- {!! Form::close() !!} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection