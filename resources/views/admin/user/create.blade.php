@extends('layouts.admin')
@section('title','Registro de usuario')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('User register') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{ __('Users') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('User register') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ __('User register') }}</h4>
                    </div>
                    {{-- {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!} --}}
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            {!! Form::label('Nombre') !!}
                            {!! Form::text('name','', ['class' => 'form-control']) !!}
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
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @include('admin.user._form')
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Register') }}</button>
                        <a href="{{route('users.index')}}" class="btn btn-light">
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