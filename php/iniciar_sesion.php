<?php
require 'conexion.php';
session_start();

$userCorreo = trim($_POST['userCorreo']);
$userPass = trim($_POST['userPass']);

// Prepara consulta segura
$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

$stmt->bind_param("s", $userCorreo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Verifica contraseña (usa password_verify si las guardas hasheadas)
    if ($row['contrasena'] === $userPass) {
        $_SESSION['user_sesion'] = $row;

        // Redirección según el rol
        if ($row['rol'] === 'administrador') {
            header("Location: ../dashboard.php?login=ok");
        } else {
            header("Location: ../index.php?login=ok");
        }
        exit();

    } else {
        header("Location: ../index.php?error=pass");
        exit();
    }

} else {
    header("Location: ../index.php?error=correo");
    exit();
}

$stmt->close();
$conexion->close();
?>


