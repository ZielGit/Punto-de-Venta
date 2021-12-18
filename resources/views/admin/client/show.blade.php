@extends('layouts.admin')
@section('title','información del cliente')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$client->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">{{ __('Clients') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$client->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$client->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        {{ __('About customer') }}
                                    </a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                        {{ __('Purchases history') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel"
                                    aria-labelledby="list-home-list">

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('Customer information') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            
                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1"></i> {{ __('Name') }}</strong>
                                                <p class="text-muted">
                                                    {{$client->name}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i> {{ __('DNI Number') }}</strong>
                                                <p class="text-muted">
                                                    {{$client->dni}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i> {{ __('RUC Number') }}</strong>
                                                <p class="text-muted">
                                                    {{$client->ruc}}
                                                </p>
                                                <hr>
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <strong><i class="fas fa-mobile mr-1"></i> {{ __('Address') }}</strong>
                                                <p class="text-muted">
                                                    {{$client->address}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-envelope mr-1"></i> {{ __('Telephone / Mobile') }}</strong>
                                                <p class="text-muted">
                                                    {{$client->phone}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-map-marked-alt mr-1"></i> {{ __('Email') }}</strong>
                                                <p class="text-muted">
                                                    {{$client->email}}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('Purchases history') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
    
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('ID') }}</th>
                                                            <th>{{ __('Date') }}</th>
                                                            <th>{{ __('Total') }}</th>
                                                            <th>{{ __('Status') }}</th>
                                                            <th>{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($client->sales as $sale)
                                                        <tr>
                                                            <th scope="row">{{$sale->id}}</th>
                                                            <td>{{$sale->purchase_date}}</td>
                                                            <td>{{$sale->total}}</td>
                        
                                                            @if ($sale->status == 'VALID')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success" href="{{route('change.status.sales', $sale)}}" title="{{ __('Edit') }}">
                                                                    {{ __('Active') }} <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger" href="{{route('change.status.sales', $sale)}}" title="{{ __('Edit') }}">
                                                                    {{ __('Cancelled') }} <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                @can('sales.pdf')
                                                                    <a href="{{route('sales.pdf', $sale)}}" title="{{ __('Pdf') }}">
                                                                        <span class="btn btn-outline-primary"><i class="far fa-file-pdf"></i></span>
                                                                    </a>
                                                                @endcan
                                                                @can('sales.print')
                                                                    <a href="{{route('sales.print', $sale)}}" title="{{ __('To print') }}">
                                                                        <span class="btn btn-outline-warning"><i class="fas fa-print"></i></span>
                                                                    </a>
                                                                @endcan
                                                                @can('sales.show')
                                                                    <a href="{{route('sales.show', $sale)}}" title="{{ __('Details')}}">
                                                                        <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                                    </a>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>{{ __('Total amount purchased') }}: </strong></td>
                                                          <td colspan="3" align="left"><strong>s/{{$total_purchases}}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('clients.index')}}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection