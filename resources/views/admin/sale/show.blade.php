@extends('layouts.admin')
@section('title','Detalles de venta')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Sale Details') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">{{ __('Sales') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Sale Details') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>{{ __('Customer') }}</strong></label>
                            <p><a href="{{ route('customers.show', $sale->customer) }}">{{ $sale->customer->name }}</a></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>{{ __('Seller') }}</strong></label>
                            <p>{{ $sale->user->name }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>{{ __('Sales Number') }}</strong></label>
                            <p>{{ $sale->id }}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group">
                        <h4 class="card-title">{{ __('Sale Details') }}</h4>
                        <div class="table-responsive col-md-12">
                            <table id="saleDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Sale Price') }} (PEN)</th>
                                        <th>{{ __('Discount') }}(PEN)</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('SubTotal') }}(PEN)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">{{ __('SUBTOTAL') }}:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{ number_format($subtotal,2) }}</p>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">{{ __('TOTAL TAX') }} ({{ $sale->tax }}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{ number_format($subtotal*$sale->tax/100,2) }}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">{{ __('TOTAL') }}:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{ number_format($sale->total,2) }}</p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($saleDetails as $saleDetail)
                                    <tr>
                                        <td>{{ $saleDetail->product->name }}</td>
                                        <td>s/ {{ $saleDetail->price }}</td>
                                        <td>{{ $saleDetail->discount }} %</td>
                                        <td>{{ $saleDetail->quantity }}</td>
                                        <td>s/{{ number_format($saleDetail->quantity*$saleDetail->price - $saleDetail->quantity*$saleDetail->price*$saleDetail->discount/100,2) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('sales.index') }}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
@endsection