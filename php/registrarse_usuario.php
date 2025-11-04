<?php
require 'conexion.php';

$nombre = trim($_POST['full_name']);
$correo = trim($_POST['correo']);
$pass = $_POST['pass'];

// Hashear la contraseña con password_hash()
$hashedPass = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $correo, $hashedPass);

if ($stmt->execute()) {
    echo "Usuario registrado con éxito";
    // Aquí puedes redirigir o mostrar mensaje
} else {
    echo "Error al registrar usuario: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
