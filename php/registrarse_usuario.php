<?php
    require 'conexion.php';
    $full_name = trim($_POST['full_name']);
    $correo = trim($_POST['correo']);
    $pass = trim($_POST['pass']);
    $rol = trim($_POST['rol']);
    $sql_save = "INSERT INTO usuarios(nombre, correo, contrasena, rol) values('$full_name','$correo','$pass', '$rol');";
    $resultado = $conexion->query($sql_save);  
    if ($resultado) {
        header('Location: ../index.php?msj=ok');
    } else {
        header('Location: ../index.php?msj=error');
    }
?>