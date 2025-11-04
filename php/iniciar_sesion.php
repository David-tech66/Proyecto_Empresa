<?php
session_start();
require 'conexion.php';

$userCorreo = trim($_POST['userCorreo']);
$userPass = $_POST['userPass'];

$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $userCorreo);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Verificar la contraseña con password_verify()
    if (password_verify($userPass, $row['contrasena'])) {
        // Guardar info de usuario en sesión
        $_SESSION['user_sesion'] = $row;
        echo "Usuario autenticado, ¡Bienvenido!";
        // header("Location: ../index.php");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Correo incorrecto";
}

$stmt->close();
$conexion->close();
?>
