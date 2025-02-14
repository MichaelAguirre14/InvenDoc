<?php
require '../config/databaseconnect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_log('Mensaje de prueba');

if (isset($_POST['guardar_permisos'])) {
    $id_empleado = $_POST['id_empleado'];

    $instanciaConexion = new Conexion();
    // Elimina registros anteriores
    $consultaEliminar = "DELETE FROM apppermisos WHERE id_emp = :id_empleado";
    
    $consultaEli = $instanciaConexion->datos->prepare($consultaEliminar);
    $consultaEli->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT); // Corregido el nombre del parámetro
    $consultaEli->execute();
    if ($consultaEli->rowCount() === false) {
        die("Error al eliminar registros anteriores");
    }
}
$instanciaConexion = new Conexion();

// Verifica si $_POST['modulosactivos'] está definido y no es nulo
if (isset($_POST['modulosactivos']) && is_array($_POST['modulosactivos'])) {
    // Prepara la sentencia de inserción
    $stmt = $instanciaConexion->datos->prepare("INSERT INTO apppermisos(id_emp, id_submodulo) VALUES (?, ?)");
    
    // Verifica si la preparación de la sentencia fue exitosa
    if (!$stmt) {
        die("Error al preparar la sentencia de inserción");
    }

    foreach ($_POST['modulosactivos'] as $id_modulo) {
        // Verifica si el índice $id_modulo existe en $_POST['submodulo']
        if (isset($_POST['submodulo'][$id_modulo]) && is_array($_POST['submodulo'][$id_modulo])) {
            foreach ($_POST['submodulo'][$id_modulo] as $id_submodulo) {
                // Ejecuta la sentencia de inserción
                $resultadoInsert = $stmt->execute([$id_empleado, $id_submodulo]);

                // Verifica si la ejecución fue exitosa
                if (!$resultadoInsert) {
                    die("Error al guardar los módulos");
                }
            }
        }
    }

    // Redirige después de procesar los datos
    header("Location: ../vista/usuarios/registroUsuario.php");
    exit(); // Añadido exit() para detener la ejecución después de la redirección
}
