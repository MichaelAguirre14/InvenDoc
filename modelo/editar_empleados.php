    <?php include("database/db.php") ?>

<?php

session_start();
$user = $_SESSION['usuario'];

?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "SELECT * FROM AppEmpleados WHERE id=$id";
  $ejecutar = sqlsrv_query($conn, $consulta);
  $i = 0;
  while ($fila = sqlsrv_fetch_array($ejecutar)) {
    $id_usuario = $fila['id'];
    $usuarioE = $fila['usuario'];
    $contrasena = $fila['contrasena'];
    $id_estado = $fila['id_estado'];
    $id_empresa = $fila['id_empresa'];
    $codigo_vendedor = $fila['cod_vendedor'];
    $caja_efectivo = $fila['caja_efectivo'];
    $consecutivo_inicial = $fila['consecutivo_inicial']; 
    $consecutivo_final = $fila['consecutivo_final'];
    $i++;
?>

<?php }
}

if (isset($_POST['actualizar'])) {
  $idUsuario = $_POST['id_usuario'];
  $usuarioE = $_POST['usuarioE'];
  $id_estado = $_POST['idEstado'];
  $tipoUsuario = $_POST['tipo_usuario'];
  $codigoVendedor = $_POST['cod_vendedor'];
  $cajaEfectivo = $_POST['caja_efectivo'];
  $consecutivoIncial = $_POST['consecutivo_inicial'];
  $consecutivoFinal = $_POST['consecutivo_final'];

  
  $nuevaPassword = $_POST['nueva_password'];
  if (!empty($nuevaPassword)) {
      // Se proporcionó una nueva contraseña, actualiza
      $contrasena = password_hash($nuevaPassword, PASSWORD_ARGON2ID);
  } else {
      // No se proporcionó una nueva contraseña, usa la contraseña original
      $contrasena = $_POST['password_original'];
  }

  $consultaEmpleados = "UPDATE AppEmpleados set cod_vendedor = '$codigoVendedor', tipo_usuario = '$tipoUsuario', usuario = '$usuarioE', 
  contrasena = '$contrasena', id_estado = '$id_estado', caja_efectivo = '$cajaEfectivo', consecutivo_inicial = '$consecutivoIncial', consecutivo_final = '$consecutivoFinal' WHERE id='$idUsuario'";

$resultadoEmpleados = sqlsrv_query($conn, $consultaEmpleados);


if (!$resultadoEmpleados) {
    die("Error");
  }
  $_SESSION['message'] = 'Usuario Editado';
  $_SESSION['message_type'] = 'success';
  header("Location: empleados.php");
}

?>
<?php include('includes/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Editar Usuario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <form action="editar_empleados.php" method="POST">
                            <h4>ID</h4>
                            <div class="form-group">
                                <input class="form-control" type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" readonly>
                            </div>
                            <p>

                            <h4>USUARIO</h4>
                            <div class="form-group">
                                <input class="form-control" type="text" name="usuarioE" value="<?php echo $usuarioE; ?>"
                                    onkeyup="mayus(this);">
                            </div>
                            <p>

                            <h4>PASSWORD</h4>
                            <div class="form-group">
                                <?php if (empty($contrasena)) { ?>
                                    <input class="form-control" type="password" name="password" value="">
                                <?php } else { ?>
                                    <input type="hidden" name="password_original" value="<?php echo $contrasena; ?>">
                                    <input class="form-control" type="password" name="nueva_password" placeholder="Nueva Contraseña">
                                <?php } ?>
                            </div>
                            <p>

                                <?php
                                    $consultaEstado = "select * from AppEstado";
                                    $ejecutarEstado = sqlsrv_query($conn, $consultaEstado); 
                                ?>

                            <h4>ESTADO</h4>
                            <div class="form-group">
                                <select name="idEstado" id="idEstado">
                                    <?php while($filaEstado = sqlsrv_fetch_array($ejecutarEstado)){
                                        echo '<option value="'.$filaEstado['id'].'">'.$filaEstado['nombre_estado'].'</option>';
					                    }  
                                    ?>
                                </select>
                            </div>      
                            <p>

                            <h4>TIPO DE USUARIO</h4>
                            <div class="form-group">
                                <select name="tipo_usuario" id="tipo_usuario">
                                    <option value="Usuario">Usuario</option>
                                    <option value="Administrador">Administrador</option>
                                </select>
                            </div>
                            <p>

                            <h4>CODIGO VENDEDOR</h4>
                            <div class="form-group">
                                <input type="text" name="cod_vendedor" class="form-control"
                                    placeholder="Codigo del vendedor" value='<?php echo $codigo_vendedor; ?>' autofocus>
                            </div>
                            <p>

                            <h4>CAJA EFECTIVO</h4>
                            <div class="form-group">
                                <input type="number" name="caja_efectivo" class="form-control"
                                    placeholder="Efectivo Caja Vendedor" value='<?php echo $caja_efectivo; ?>' autofocus>
                            </div>
                            <p>

                            <h4>CONSECUTIVO INICIAL</h4>
                            <div class="form-group">
                                <input type="number" name="consecutivo_inicial" class="form-control"
                                    value='<?php echo $consecutivo_inicial; ?>' autofocus>
                            </div>
                            <p>

                            <h4>CONSECUTIVO FINAL</h4>
                            <div class="form-group">
                                <input type="number" name="consecutivo_final" class="form-control"
                                     value='<?php echo $consecutivo_final; ?>' autofocus>
                            </div>
                            <p>
                                
                                <input type="submit" class="btn btn-primary btn-block" name="actualizar" value="ACTUALIZAR">
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
function mayus(e) {
    e.value = e.value.toUpperCase().trimEnd();

}
</script>


<?php include("includes/footer.php")?>