@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Dashboard') }}
        </h3>
    </div>

    <div class="row grid-margin">
        <div class="col-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-cart-arrow-down mr-2"></i>  {{ __("Today's Sales") }}</p>
                            <h2>S/. {{ $purchasesToday }}</h2>
                            <label class="badge badge-outline-success badge-pill">
                                <a href="{{ route('purchases.index') }}" class="text-success"> {{ __('More Info') }}</a>
                            </label>
                        </div>
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-shopping-cart mr-2"></i>  {{ __('Shopping Today') }}</p>
                            <h2>S/. {{ $salesToday }}</h2>
                            <label class="badge badge-outline-success badge-pill">
                                <a href="{{ route('sales.index') }}" class="text-success"> {{ __('More Info') }}</a>
                            </label>
                        </div>
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-box  mr-2"></i> {{ __('Products') }}</p>
                            <h2>{{ $product['active'] }}</h2>
                            <label class="badge badge-outline-success badge-pill">
                                <a href="{{ route('products.index') }}" class="text-success"> {{ __('More Info') }}</a>
                            </label>
                        </div>
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-shipping-fast mr-2"></i>  {{ __('Providers') }}</p>
                            <h2>{{ $provider['all'] }}</h2>
                            <label class="badge badge-outline-success badge-pill">
                                <a href="{{ route('providers.index') }}" class="text-success"> {{ __('More Info') }}</a>
                            </label>
                        </div>
                        
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-users mr-2"></i>  {{ __('Clients') }}</p>
                            <h2>{{ $client['all'] }}</h2>
                            <label class="badge badge-outline-success badge-pill">
                                <a href="{{ route('clients.index') }}" class="text-success"> {{ __('More Info') }}</a>
                            </label>
                        </div>
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-user-tag mr-2"></i>  {{ __('Users') }}</p>
                            <h2>{{ $user['all'] }}</h2>
                            <label class="badge badge-outline-success badge-pill">
                                <a href="{{ route('users.index') }}" class="text-success"> {{ __('More Info') }}</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-gift"></i>
                        {{ __('Daily Sales') }}
                    </h4>
                    <canvas id="ventas_diarias" height="100"></canvas>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-gift"></i>
                        {{ __('Purchases - Months') }}
                    </h4>
                    <canvas id="compras"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        {{ __('Sales - Months') }}
                    </h4>
                    <canvas id="ventas"></canvas>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        {{ __('Most selled products') }}
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Stock') }}</th>
                                    <th>{{ __('Quantity sold') }}</th>
                                    <th>{{ __('See details') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                <tr>
                                    <td>{{$productosvendido->id}}</td>
                                    <td>{{$productosvendido->name}}</td>
                                    <td>{{$productosvendido->code}}</td>
                                    <td><strong>{{$productosvendido->stock}}</strong> {{ __('Units') }}</td>
                                    <td><strong>{{$productosvendido->quantity}}</strong> {{ __('Units') }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('products.show', $productosvendido->id)}}">
                                            <i class="far fa-eye"></i>
                                            {{ __('See details') }}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    
</div>
@endsection
@section('scripts')
<script src="{{asset('melody/js/data-table.js')}}"></script>
<script src="{{asset('melody/js/chart.js')}}"></script>
<script>
    $(function () {
        // var varCompra=document.getElementById('compras').getContext('2d');
    
        // 

        // var varVenta=document.getElementById('ventas').getContext('2d');
        // 
        
        // var varVenta=document.getElementById('ventas_diarias').getContext('2d');
        // 
    });
</script>
@endsection