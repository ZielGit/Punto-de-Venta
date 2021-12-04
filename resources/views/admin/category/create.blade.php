@extends('layouts.admin')
@section('title','Registrar categoría')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Category Registration') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{ __('Category') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Category Registration') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ __('Category Registration') }}</h4>
                    </div>
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        @include('admin.category._form')
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Register')}}</button>
                        <a href="{{route('categories.index')}}" class="btn btn-light">
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