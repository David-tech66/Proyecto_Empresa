<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/dashboard_2/styles.css">
</head>

<body>
    <button class="menu-toggle" onclick="toggleSidebar()">
        <i class="fa-solid fa-bars"></i>
    </button>
    <!-- Menu Lateral -->
    <?php include 'includes/menu.php';  ?>
    <!-- CONTENIDO PRINCIPAL -->
    <div class="content" id="content">
        <h1>Dashboard Principal</h1>
        <div id="content-area" class="card">
            <p>¡Bienvenido a su Centro de Control!</p>
        </div>
    </div>

    <script src="assets/dashboard_2/main.js"></script>
</body>

</html>