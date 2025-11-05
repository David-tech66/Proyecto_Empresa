<?php
require('../php/conexion.php');
session_start();
if (isset($_SESSION['user_sesion'])){
    $nombre_user = $_SESSION['user_sesion']['nombre'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <link rel="shortcut icon" href="../assets/imagen/logo.webp" type="image/webp">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/dashboard_2/styles.css">
    <link rel="stylesheet" href="../assets/dashboard_2/tables.css">
</head>

<body>
    <button class="menu-toggle" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
    <!-- MENU LATERAL -->
    <?php  include '../includes/menu.php';  ?>
    <!-- CONTENIDO PRINCIPAL -->

    <div class="content" id="content">
        <h1>Productos | Reportes</h1>
            <div id="content-area" class="card">
                <table>
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Codigo</th>
                    <th>Usuario</th>
                </tr>
                <?php 
                $sql="
                    SELECT * FROM productos AS p
                    INNER JOIN usuarios AS u   
                    ON u.id = p.id            
                ";
                $resultado = mysqli_query($conexion,$sql);
                while($dato = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){  
                    echo "<tr>";
                    echo "<td>".$dato['id']."</td>";      
                    echo "<td>".$dato['nombre']."</td>";      
                    echo "<td>".$dato['descripcion']."</td>";      
                    echo "<td>".$dato['precio']."</td>";      
                    echo "<td>".$dato['imagen_url']."</td>";      
                    echo "<td>".$dato['categoria']."</td>";      
                    echo "<td>".$dato['stock']."</td>";      
                    echo "<td>".$dato['fecha_creacion']."</td>";            
                    echo "</tr>";
                    //print_r($dato);
                }
                ?>
            </table>
        </div>
    </div>
    <script src="../assets/dashboard_2/main.js"></script>
</body>

</html>