<!DOCTYPE html>
<html lang="en">

<!--inicio del header-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Integrado</title>

    <link rel="shortcut icon" href="vistas/assets/dist/img/AdminLTELogo.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="vistas/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vistas/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="vistas/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="vistas/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="vistas/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="vistas/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Calendario y hora (https://flatpickr.js.org/)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



    <!--tabla-->

    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="vistas/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vistas/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vistas/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vistas/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vistas/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="vistas/assets/plugins/jszip/jszip.min.js"></script>
    <script src="vistas/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="vistas/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="vistas/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="vistas/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="vistas/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <!-- Calendario y hora (https://flatpickr.js.org/)-->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar en la parte superior-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Flota</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Mantenimiento</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="vistas/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Cesar Pardo</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="index.php" style="cursor: pointer;" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Tablero principal</p>
                            </a>
                        </li>

                        <!--menú flota-->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-truck-moving"></i>
                                <p>
                                    Flota
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="tipoflota.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo Flota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="flota.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista flota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="tipomantenimiento.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo mantenimiento</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--fin menú flota-->

                        <!--menú mantenimiento-->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-truck-moving"></i>
                                <p>
                                    Mantenimiento
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="estado.php" style="cursor: pointer;" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Estado</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="sede.php" style="cursor: pointer;" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sede</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="tipodocumentacion.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo documentación</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="proveedores.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proveedores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="tramitesdoc.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Trámite Doc.</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!--fin menú flota-->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!--fin del header-->