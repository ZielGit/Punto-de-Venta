@extends('layouts.admin')
@section('title','Gestión de clientes')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>

    @can('clients.create')
        <div class="row">
            <div class="col mb-2">
                <a href="{{route('clients.create')}}">
                    <span class="btn btn-primary">+ Nuevo Cliente</span>
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
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono / Celular</th>
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->dni}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>     
                                        <form action="{{route('clients.destroy', $client)}}" class="frmEliminar" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('clients.show')
                                                <a href="{{route('clients.show', $client)}}" title="Detalles">
                                                    <span class="btn btn-outline-dark"><i class="far fa-eye"></i></span>
                                                </a>
                                            @endcan
                                            @can('clients.edit')
                                                <a href="{{route('clients.edit', $client)}}" title="Editar">
                                                    <span class="btn btn-outline-info"><i class="fas fa-edit"></i></span>
                                                </a>
                                            @endcan
                                            @can('clients.destroy')
                                                <button class="btn btn-outline-danger" type="submit" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            @endcan
                                        </form>
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
<script src="{{asset('melody/js/data-table.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#dataTable').DataTable( {
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
    } );
</script>

@if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado',
            'El cliente ha sido eliminado',
            'success'
        )
    </script>
@endif
<script>
    $('.frmEliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
            title:'¿Estas Seguro?',
            text:'¡No podrás revertir esto!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, bórralo!'
        }).then((result) =>{
            if(result.value){
                this.submit();
            }
        })
    })
</script>
@endsection