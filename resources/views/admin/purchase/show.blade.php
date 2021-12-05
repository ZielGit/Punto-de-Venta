@extends('layouts.admin')
@section('title','Detalles de compra')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Purchase Details') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">{{ __('Purchases') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Purchase Details') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="nombre"><strong>{{ __('Provider') }}</strong></label>
                            <p>{{$purchase->provider->name}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>{{ __('Purchase Number') }}</strong></label>
                            <p>{{$purchase->id}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>{{ __('Buyer') }}</strong></label>
                            <p>{{$purchase->user->name}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group row ">
                        <h4 class="card-title ml-3">{{ __('Purchase Details') }}</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }} (PEN)</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('SubTotal') }} (PEN)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">{{ __('SUBTOTAL') }}:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">{{ __('TOTAL TAX') }} ({{$purchase->tax}}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">{{ __('TOTAL') }}:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($purchase->total,2)}}</p>
                                        </th>
                                    </tr>
                    
                                </tfoot>
                                <tbody>
                                    @foreach($purchaseDetails as $purchaseDetail)
                                    <tr>
                                        <td>{{$purchaseDetail->product->name }}</td>
                                        <td>s/{{$purchaseDetail->price}}</td>
                                        <td>{{$purchaseDetail->quantity}}</td>
                                        <td>s/{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('purchases.index')}}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
@endsection