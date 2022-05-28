@extends('layouts.admin')
@section('title') {{ __('Category Details') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Products belonging to ') }} {{ $category->name }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Categories')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col mb-2">
            @can('products.create')
                <a href="{{ route('products.create') }}">
                    <span class="btn btn-primary">{{ __('Add')}}</span>
                </a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Stock') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock }}</td>

                                    @if ($product->status == 'ACTIVE')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{ route('change.status.products', $product) }}" title="{{ __('Edit') }}">
                                            {{ __('Active')}} <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{ route('change.status.products', $product) }}" title="{{ __('Edit') }}">
                                            {{ __('Disabled')}} <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        {{-- Error al eliminar, no redirecciona a products.index ni con laravel collective --}}
                                        {{-- El error tal vez se produzca con producto que han vendido o comprado, producto sin hitorial normal--}}
                                        <form action="{{ route('products.destroy', $product) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('products.edit')
                                                <a href="{{ route('products.edit', $product) }}" title="{{ __('Edit') }}">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            <button class="btn btn-outline-danger" type="submit" title="{{ __('Delete') }}">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">{{ __('Return')}}</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
@endsection