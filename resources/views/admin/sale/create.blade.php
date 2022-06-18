@extends('layouts.admin')
@section('title') {{ __('Sale Register') }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{ __('Sale Register') }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">{{ __('Sales') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Sale Register') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <form action="{{ route('sales.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('admin.sale._form')
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right">{{ __('To Register') }}</button>
                        <a href="{{ route('sales.index') }}" class="btn btn-light">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal starts -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">{{ __('Quick Customer Registration') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('customers.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="document_type">{{ __('Document Type') }}</label>
                        <select class="form-control" name="document_type" id="document_type">
                            <option value="DNI">{{ __('DNI') }}</option>
                            <option value="RUC">{{ __('RUC') }}</option>
                        </select>
                        @error('document_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="document_number">{{ __('Document Number') }}</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="document_number" id="document_number" value="{{ old('document_number') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="buttonSearch">{{ __('Search') }}</button>
                            </div>
                        </div>
                        @error('document_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="sent_from" value="sale">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('To Register') }}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Ends -->

@endsection
@section('scripts')
<script src="{{ asset('melody/js/select2.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
@if ($errors->has('document_type') || $errors->has('document_number') || $errors->has('name'))
    <script type="text/javascript">
        $('#clientModal').modal('show');
    </script>
@endif
@if (session('success') == 'ok')
    <script>
        Swal.fire({
            icon: "success",
            title: "El cliente ha sido creado correctamente",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
<script>
    $(document).ready(function () {
        $("#agregar").click(function () {
            agregar();
        });
    });

    var cont = 1;
    total = 0;
    subtotal = [];

    $("#guardar").hide();

    $("#product_id").change(mostrarValores);
    function mostrarValores() {
        datosProducto = document.getElementById('product_id').value.split('_');
        $("#price").val(datosProducto[2]);
        $("#stock").val(datosProducto[1]);
    }

    var product_id = $('#product_id');
        
    product_id.change(function(){
        var product_id = $('#product_id');
        $.ajax({
            url: "{{ route('get_products_by_id') }}",
            method: 'GET',
            data:{
                product_id: product_id.val(),
            },
            success: function(data){
                $("#price").val(data.sell_price);
                $("#stock").val(data.stock);
                $("#code").val(data.code);
            }
        });
    });

    $(obtener_registro());
    function obtener_registro(code){
        $.ajax({
            url: "{{ route('get_products_by_barcode') }}",
            type: 'GET',
            data:{
                code: code
            },
            dataType: 'json',
            success:function(data){
                $("#price").val(data.sell_price);
                $("#stock").val(data.stock);
                $("#product_id").val(data.id).trigger('change.select2');
            }
        });
    }

    $(document).on('keyup', '#code', function(){
        var valorResultado = $(this).val();
        if(valorResultado!=""){
            obtener_registro(valorResultado);
        }else{
            obtener_registro();
        }
    })

    function agregar() {
        datosProducto = document.getElementById('product_id').value.split('_');
        product_id = datosProducto[0];
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        discount = $("#discount").val();
        price = $("#price").val();
        stock = $("#stock").val();
        impuesto = $("#tax").val();
        if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
            if (parseInt(stock) >= parseInt(quantity)) {
                subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                total = total + subtotal[cont];
                var fila = '<tr id="fila'+cont+'">'+
                    '<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td>'+
                    '<td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td>'+
                    '<td><input type="hidden" name="price[]" value="'+parseFloat(price).toFixed(2)+'"> <input class="form-control" type="number" value="'+parseFloat(price).toFixed(2)+'" disabled></td>'+
                    '<td><input type="hidden" name="discount[]" value="'+parseFloat(discount)+'"> <input class="form-control" type="number" value="'+parseFloat(discount)+'" disabled></td>'+
                    '<td><input type="hidden" name="quantity[]" value="'+quantity+'"> <input type="number" value="'+quantity+'" class="form-control" disabled></td>'+
                    '<td align="right">s/'+parseFloat(subtotal[cont]).toFixed(2)+'</td>'+
                '</tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'La cantidad a vender supera el stock.',
                })
            }
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la venta.',
            })
        }
    }

    function limpiar() {
        $("#quantity").val("");
        $("#discount").val("0");
    }

    function totales() {
        $("#total").html("PEN " + total.toFixed(2));
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("PEN" + total);
        $("#total_impuesto").html("PEN" + total_impuesto);
        $("#total_pagar_html").html("PEN" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }

    $('#buttonSearch').click(function(){
        var document_type = $('#document_type');
        var document_number = $('#document_number');
        $.ajax({
            url: "{{ route('search') }}",
            method: 'GET',
            data: {
                document_type: document_type.val(),
                document_number: document_number.val(),
            },
            dataType: 'json',
            success:function(data){
                $('#name').val(data.nombre);
            }
        });
    });
</script>
@endsection