@extends('layouts.admin')
@section('title') {{ __('Purchasing Management') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Purchases') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Purchases') }}</li>
            </ol>
        </nav>
    </div>
    @can('purchases.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('purchases.create') }}">
                    <span class="btn btn-primary">+ {{ __('New Purchase') }}</span>
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
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
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">{{ $purchase->id }}</th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a') }}
                                    </td>
                                    <td>{{ $purchase->total }}</td>

                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success change" href="{{ route('change.status.purchases', $purchase) }}" title="{{ __('Edit') }}">
                                            {{ __('Active') }} <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger disabled" href="{{ route('change.status.purchases', $purchase) }}" title="{{ __('Edit') }}">
                                            {{ __('Cancelled') }} <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    
                                    <td>
                                        @can('purchases.pdf')
                                            <a href="{{ route('purchases.pdf', $purchase) }}" title="{{ __('Pdf') }}">
                                                <span class="btn btn-outline-primary"><i class="far fa-file-pdf"></i></span>
                                            </a>
                                        @endcan
                                        @can('purchases.show')
                                            <a href="{{ route('purchases.show', $purchase) }}" title="{{ __('Details') }}">
                                                <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    $(".change").click( function(e){
        e.preventDefault();
        Swal.fire({
            title:'??Quiere descartar la compra?',
            text:'??No podr??s revertir esto!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '??Si, desc??rtalo!',
            cancelButtonText: 'Cancelar'
        }).then((result) =>{
            if(result.value){
                this.submit();
            }
        })
    })
</script>
@endsection