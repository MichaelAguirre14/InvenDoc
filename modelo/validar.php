<?php
require '../../config/databaseconnect.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$empresa = $_POST['empresa'];

$consulta = "SELECT * FROM usuarios WHERE User = ?";
$consultaPreparada = $instanciaConexion->datos->prepare($consulta);
$consultaPreparada->bindParam(1, $usuario, PDO::PARAM_STR);
$consultaPreparada->execute();

if ($row = $consultaPreparada->fetch(PDO::FETCH_ASSOC)) {
    $hashedPassword = $row['contrasena'];

    if (password_verify($contrasena, $hashedPassword)) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['verificar'] = true;

        $tipoUsuario = $row['tipo_usuario'];

        if ($tipoUsuario == "Administrador") {
            header("Location: dashboard.php");
            exit(); // Es buena práctica añadir exit() después de header("Location: ...") para asegurar la redirección.
        } elseif ($tipoUsuario == "Bodega") {
            header("Location: ubicaciones.php");
            exit();
        } else {
            header("Location: buscar.php");
            exit();
        }
    } else {
        // Autenticación fallida, redirige al index.php con el parámetro error
        header("Location: index.php?error=1");
        exit();
    }
} else {
    echo "Usuario no encontrado.";
    // Autenticación fallida, redirige al index.php con el parámetro error
    header("Location: index.php?error=1");
    exit();
}
?>
