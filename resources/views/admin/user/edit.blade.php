@extends('layouts.admin')
@section('title','Editar usuario')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Edit User') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{ __('Users') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Edit User') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ __('Edit User') }}</h4>
                    </div>
                    {!! Form::model($user,['route'=>['users.update',$user], 'method'=>'PUT']) !!}
                    
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" value="{{old('name',$user->name)}}" class="form-control">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" value="{{old('email',$user->email)}}" class="form-control">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      
                      {{--  <div class="form-group">
                          <label for="password">Contraseña</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Rellenar solo si desea cambiar la contraseña.</small>
                      </div>  --}}

                        @include('admin.user._form')
                    
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Update')}}</button>
                        <a href="{{route('users.index')}}" class="btn btn-light">
                            {{ __('Cancel') }}
                        </a>
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection