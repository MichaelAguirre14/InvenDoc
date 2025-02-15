<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controlador/UsuarioControlador.php';

$id_usuario_en_sesion = $_SESSION['User'];

$instanciaConexion = new Conexion(); 

$sql = "SELECT * FROM usuarios WHERE User = :id";
$consulta = $instanciaConexion->datos->prepare($sql);
$consulta->bindParam(':id', $id_usuario_en_sesion);
$consulta->execute();

// Verifica si se encontraron resultados
if ($consulta->rowCount() > 0) {
    $fila = $consulta->fetch(PDO::FETCH_OBJ);

    // Verifica si la propiedad 'idUser' está definida en el objeto
    if (property_exists($fila, 'IdUser')) {
        $id_usuario = $fila->IdUser;

    }
} else {
    // Maneja el caso en el que no se encuentre ningún resultado
    echo "No se encontró ninguna persona con ese ID.";
}

    // Realizar la consulta SQL para obtener los módulos y submódulos
    $sql1 = "SELECT m.icono, m.id_modulo_principal, m.nombre AS modulo_nombre, s.id_submodulo, s.nombres AS submodulo_nombre, s.icono AS submodulo_icono, s.urls AS submodulo_url
            FROM apppermisos AS p
            INNER JOIN appsubmodulos AS s ON p.id_submodulo = s.id_submodulo
            INNER JOIN appmodulos AS m ON s.id_modulo_principal = m.id_modulo_principal
            WHERE p.id_emp = '$id_usuario'
            ORDER BY id_modulo_principal asc";

    $consulta = $instanciaConexion->datos->prepare($sql1);
    $consulta->execute();

    $result = $consulta->fetchAll(PDO::FETCH_ASSOC);

// Construir el menú dinámico
$menu = array();

foreach ($result as $row) {
    $moduloId = $row['id_modulo_principal'];
    $submoduloId = $row['id_submodulo'];

    // Agregar el módulo al menú si aún no está agregado
    if (!isset($menu[$moduloId])) {
        $menu[$moduloId] = array(
            'nombre' => $row['modulo_nombre'],
            'icono' => $row['icono'],
            'submodulos' => array()
        );
    }

    // Agregar el submódulo al módulo correspondiente
    $menu[$moduloId]['submodulos'][$submoduloId] = array(
        'nombre' => $row['submodulo_nombre'],
        'icono' => $row['submodulo_icono'],
        'url' => $row['submodulo_url']
    );
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Catalago</title>

    <!--BOOTSTRAP 5.1.3-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link type="text/css" href="css/ui-darkness/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

<link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
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
           <center> 
<img src="../../img/logo.png" alt="Logo" class="img-circle" style="width: 100px; height: 100px; border-radius: 50%; box-shadow: none;"> 
      </center class="brand-image img-circle elevation-3" style="opacity: .8">
                <!--<span class="brand-text font-weight-light"></span>-->
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


      <style>
            .modulo-destacado {
                margin-left: 25px; /* Ajusta el valor según sea necesario */
            }
    </style>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
  
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php foreach ($menu as $moduloId => $modulo) : ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon <?php echo $modulo['icono']; ?>"></i>
                                    <?php echo $modulo['nombre']; ?>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($modulo['submodulos'] as $submoduloId => $submodulo) : ?>
                                        <li class="nav-item">
                                            <a style="cursor: pointer;" class="nav-link modulo-destacado nav-modulo" href="<?php echo $submodulo['url']; ?>">
                                                <i class="nav-icon <?php echo $submodulo['icono']; ?>"></i>
                                                <?php echo $submodulo['nombre']; ?>
                                            </a>
                                        </li>   
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                        <!-- Agregar el elemento de "Salir" -->
                        <li class="nav-item">
            <a href="../salir.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
              Salir
              </p>
            </a>
          </li>     
                    </ul>

                </nav>

            </div>
            <!-- /.sidebar -->
        </aside>
        <script>
    // Obtén el nombre de la página actual
    var currentPage = window.location.pathname.split("/").pop();

    // Obtén todos los elementos de módulo
    var modulos = document.getElementsByClassName("nav-modulo");

    // Recorre los elementos de módulo y verifica si la página actual coincide con el enlace href
    for (var i = 0; i < modulos.length; i++) {
        var modulo = modulos[i];
        var href = modulo.getAttribute("href");
        if (href === currentPage) {
            // Agrega la clase "active" al elemento de módulo correspondiente
            modulo.classList.add("active");

            // Si es necesario, abre automáticamente los submenús
            var parent = modulo.parentNode;
            while (parent) {
                if (parent.classList.contains("nav-treeview")) {
                    parent.parentNode.classList.add("menu-open");
                    break;
                }
                parent = parent.parentNode;
            }

            // Si es necesario, realiza otras acciones dependiendo de la estructura y comportamiento de tu plantilla
            // ...
            // ...
        }
    }
</script>