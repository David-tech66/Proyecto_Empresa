<?php
require('../conexion.php'); // Ajusta la ruta según tu estructura
session_start();

// Reportar errores de mysqli como excepciones
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger y limpiar datos
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $pass = trim($_POST['contrasena']);
    $rol = isset($_POST['rol']) ? $_POST['rol'] : 'cliente';

    if (empty($nombre) || empty($correo) || empty($pass)) {
        die("<script>alert('Todos los campos son obligatorios'); window.history.back();</script>");
    }

    $pass_hash = hash('sha256', $pass); // Hash SHA-256 como tu admin

    try {
        // Insertar usuario
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $correo, $pass_hash, $rol);
        $stmt->execute();

        echo "<script>alert('Usuario registrado exitosamente'); window.location.href='/Proyecto_Empresa/dashboard_1/usuario_reporte.php';</script>";

    } catch (mysqli_sql_exception $e) {
        // Manejar duplicados de correo
        if (strpos($e->getMessage(), "Duplicate entry") !== false) {
            echo "<script>alert('El correo ya está registrado'); window.history.back();</script>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
    $stmt->close();
    $conexion->close();
}
?>