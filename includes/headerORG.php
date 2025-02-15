<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Disanty</title>

    <!--BOOTSTRAP 5.1.3-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link type="text/css" href="css/ui-darkness/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../assets/dist/img/AdminLTELogo.png" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
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
            <a href="#" class="brand-link">
                <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">pp Guias</span>
            </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" href="../guias/buscar.php">
              <i class="nav-icon fas fa-motorcycle"></i>
              <p>
                Generar Guia
              </p>
            </a>
          </li>   
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link " href="../informes/informeGuias.php">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Guias Generadas
              </p>
            </a>
          </li>      
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link " href="../usuarios/registroRemitente.php">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Crear Remitente
              </p>
            </a>
          </li>     
          <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="#">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Informe Guias
                                </p>
                            </a>
                        </li>     
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="../informes/informeMensajero.php"> 
                            <i class="fa-solid fa-clapperboard"></i>
                                <p>
                                    Informe Mensajeros
                                </p>
                            </a>
                        </li>                   
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="../usuarios/registroUsuario.php">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Crear Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="#">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Crear Metodos de Pago
                                </p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="../usuarios/devolucion.php">
                            <i class="fa-solid fa-boxes-packing"></i>
                                <p>
                                    Devolucion
                                </p>
                            </a>
                        </li>    
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="../usuarios/entrega.php">
                            <i class="fa-solid fa-box-open"></i>
                                <p>
                                    Entrega
                                </p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link" href="../usuarios/Asignacion.php">
                            <i class="fa-solid fa-podcast"></i>
                                <p>
                                    Asginacion
                                </p>
                            </a>
                        </li>  
          <li class="nav-item">
            <a href="../salir.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
              Salir
              </p>
            </a>
          </li>                                                          

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
        </aside>
        <script>
        $(".nav-link").on('click', function() {
            $(".nav-link").removeClass('active');
            $(this).addClass('active');
        })
        </script>