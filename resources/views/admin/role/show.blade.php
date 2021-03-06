@extends('layouts.admin')
@section('title') {{ __('Role Information') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ $role->name }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $role->name }}</li>
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
                                <h3>{{ $role->name }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        {{ __('Permissions') }}
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                        {{ __('Users') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('Permissions assigned to the role') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="table-responsive">
                                                <table id="dataTable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('ID') }}</th>
                                                            <th>{{ __('Name') }}</th>
                                                            <th>{{ __('Description') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($role->permissions as $permission)
                                                        <tr>
                                                            <th scope="row">{{ $permission->id }}</th>
                                                            <td>{{ $permission->name }}</td>
                                                            <td>{{ $permission->description }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>{{ __('Users with the role') }}</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <div class="table-responsive">
                                                <table id="tableUser" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Id') }}</th>
                                                            <th>{{ __('Name') }}</th>
                                                            <th>{{ __('Email') }}</th>
                                                            <th>{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($role->users as $user)
                                                        <tr>
                                                            <th scope="row">{{ $user->id }}</th>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                {!! Form::open(['route'=>['users.destroy',$user], 'method'=>'DELETE']) !!}
                        
                                                                @can('users.show')
                                                                    <a href="{{ route('users.show', $user) }}" title="{{ __('Details') }}">
                                                                        <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                                    </a>
                                                                @endcan
                                                                @can('users.edit')
                                                                    <a href="{{ route('users.edit', $user) }}" title="{{ __('Edit') }}">
                                                                        <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                                    </a>
                                                                @endcan
                                                                @can('users.destroy')
                                                                    <button class="btn btn-outline-danger" type="submit" title="{{ __('Delete') }}">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                @endcan
                        
                                                                {!! Form::close() !!}
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
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('roles.index') }}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
<script>
    $('#tableUser').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por p??gina",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la p??gina _PAGE_ de _PAGES_",
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