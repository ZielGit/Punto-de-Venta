<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('melody/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('melody/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('melody/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('melody/css/style.css') }}">
    @yield('styles')
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('melody/images/logo-mini.svg') }}" />
</head>
<body class="sidebar-dark">
    <!-- Agrege el tema sidebar-dark en el body-->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
            
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. {{ __('All rights reserved.') }}</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">{{ __('Hand-crafted & made with ') }}<i class="far fa-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('melody/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('melody/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('melody/js/off-canvas.js') }}"></script>
    <script src="{{ asset('melody/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('melody/js/misc.js') }}"></script>
    <script src="{{ asset('melody/js/settings.js') }}"></script>
    <script src="{{ asset('melody/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- DataTable -->
    <script src="{{ asset('melody/js/data-table.js') }}"></script>
    <!-- Cambio de idioma-->
    <script type="text/javascript">
        "use strict";
        
        $('#dataTable').DataTable({
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
        
        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
    </script>
    <!-- End custom js for this page-->
    @yield('scripts')
</body>
</html>