<?php
    require 'conexion.php';
    #Almacenamos en una variable
    #Post es del FORM - 'name'
    $full_name = trim($_POST['full_name']);
    $correo = trim($_POST['correo']);
    $pass = trim($_POST['pass']);
    $sql_save="INSERT INTO usuarios(nombre, correo, contrasena) values('$full_name','$correo','$pass');";
    $resultado = $conexion->query($sql_save);  
    if($resultado){
        header('Location: ../index.php?msj=ok');
    }else{
        header('Location: ../index.php?msj=error');
    }
?>