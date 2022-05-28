@extends('layouts.admin')
@section('title') {{ __('Register Category') }} @endsection
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
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        @include('admin.category._form')
                        <button type="submit" class="btn btn-primary mr-2">{{ __('To Register')}}</button>
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