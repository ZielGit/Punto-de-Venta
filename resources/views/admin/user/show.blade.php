@extends('layouts.admin')
@section('title','Información sobre el usuario')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ $user->name }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
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
                                <h3>{{ $user->name }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" user="tab" aria-controls="home">
                                        {{ __('About the user') }}
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">
                                        {{ __('Purchases History') }}
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" user="tab" aria-controls="messages">
                                        {{ __('Sales History') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel" aria-labelledby="list-home-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('User Information') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1"></i> {{ __('Name') }}</strong>
                                                <p class="text-muted">
                                                    {{ $user->name }}
                                                </p>
                                                <hr>
                                                <strong><i class="fab fa-product-hunt mr-1"></i> {{ __('Roles') }}</strong>
                                                <p class="text-muted">
                                                    @foreach ($user->roles as $role)
                                                        <a href="{{ route('roles.show',$role) }}">{{ $role->name }}</a> <br>
                                                    @endforeach
                                                </p>
                                                <hr>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong><i class="fas fa-mobile mr-1"></i> {{ __('Email') }}</strong>
                                                <p class="text-muted">
                                                    {{ $user->email }}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('Purchases History') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="table-responsive">
                                                <table id="tablePurchase" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('ID') }}</th>
                                                            <th>{{ __('Date') }}</th>
                                                            <th>{{ __('Total') }}</th>
                                                            <th>{{ __('Status')}}</th>
                                                            <th>{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user->purchases as $purchase)
                                                        <tr>
                                                            <th scope="row">{{ $purchase->id }}</th>
                                                            <td>{{ $purchase->purchase_date }}</td>
                                                            <td>{{ $purchase->total }}</td>
                        
                                                            @if ($purchase->status == 'VALID')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success" href="{{ route('change.status.purchases', $purchase) }}" title="{{ __('Edit') }}">
                                                                    {{ __('Active') }} <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger" href="{{ route('change.status.purchases', $purchase) }}" title="{{ __('Edit') }}">
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
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>{{ __('Total amount purchased') }}: </strong></td>
                                                          <td colspan="3" align="left"><strong>s/{{ $total_amount_sold }}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-messages" user="tabpanel" aria-labelledby="list-messages-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('Sales History') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
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
                                                        @foreach ($user->sales as $sale)
                                                        <tr>
                                                            <th scope="row">{{ $sale->id }}</th>
                                                            <td>{{ $sale->sale_date }}</td>
                                                            <td>{{ $sale->total }}</td>
                        
                                                            @if ($sale->status == 'VALID')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success" href="{{ route('change.status.sales', $sale) }}" title="{{ __('Edit') }}">
                                                                    {{ __('Active') }} <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger" href="{{ route('change.status.sales', $sale) }}" title="{{ __('Edit') }}">
                                                                    {{ __('Cancelled') }} <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                        
                                                            <td>
                                                                @can('sales.pdf')
                                                                    <a href="{{ route('sales.pdf', $sale) }}" title="{{ __('Pdf') }}">
                                                                        <span class="btn btn-outline-primary"><i class="far fa-file-pdf"></i></span>
                                                                    </a>
                                                                @endcan
                                                                @can('sales.print')
                                                                    <a href="{{ route('sales.print', $sale) }}" title="{{ __('Print') }}">
                                                                        <span class="btn btn-outline-warning"><i class="fas fa-print"></i></span>
                                                                    </a>
                                                                @endcan
                                                                @can('sales.show')
                                                                    <a href="{{ route('sales.show', $sale) }}" title="{{ __('Details') }}">
                                                                        <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                                    </a>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>{{ __('Total amount sold') }}: </strong></td>
                                                          <td colspan="3" align="left"><strong>s/{{ $total_purchases }}</strong></td>
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
                    <a href="{{ route('users.index') }}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
<script>
    $('#tablePurchase').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
</script>
@endsection