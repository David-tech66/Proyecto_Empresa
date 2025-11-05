<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar entradas
    $nombre = trim($_POST['full_name']);
    $correo = trim($_POST['correo']);
    $pass = trim($_POST['pass']); // Contraseña en texto plano (sin hash)

    // Verificar si el correo ya existe
    $check = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $check->bind_param("s", $correo);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Correo existente → mensaje y salida
        echo "<script>
            window.location.href = '../index.php?msj=correo_existente';
        </script>";
        exit();
    }

    $check->close();

    // Insertar nuevo usuario (guardando la contraseña normal)
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (?, ?, ?, 'cliente')");
    $stmt->bind_param("sss", $nombre, $correo, $pass);

    if ($stmt->execute()) {
        echo "<script>
            window.location.href = '../index.php?msj=ok';
        </script>";
    } else {
        echo "<script>
            window.location.href = '../index.php?msj=error';
        </script>";
    }

    $stmt->close();
    $conexion->close();
}
?>

