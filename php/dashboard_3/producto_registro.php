<?php
require '../conexion.php';
session_start();

// Recibir datos del formulario
$cat_pro = $_POST['ctp'] ?? '';
$nomp    = $_POST['nombreP'] ?? '';
$precio  = $_POST['precio'] ?? 0;
$stock   = $_POST['stock'] ?? 0;
$estado  = $_POST['estado'] ?? 'activo';
$id_user = $_SESSION['user_sesion']['id'] ?? 0;

// Procesar imagen si se subió
$img_url = '';
if (isset($_FILES['img_url']) && $_FILES['img_url']['error'] === 0) {
    $carpetaDestino = "../../uploads/";
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    $nombreArchivo = uniqid() . "_" . basename($_FILES['img_url']['name']);
    $rutaDestino = $carpetaDestino . $nombreArchivo;

    if (move_uploaded_file($_FILES['img_url']['tmp_name'], $rutaDestino)) {
        $img_url = "uploads/" . $nombreArchivo;
    }
}

// Validar campos
if (!empty($nomp) && !empty($precio) && !empty($cat_pro)) {
    $stmt = $conexion->prepare("INSERT INTO productos (nombre, precio, imagen_url, categoria, stock) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssi", $nomp, $precio, $img_url, $cat_pro, $stock);

    if ($stmt->execute()) {
        echo "<script>
            alert('✅ Producto registrado correctamente');
            window.location.href='../../dashboard/dashboard_productos.php';
        </script>";
    } else {
        echo "<script>
            alert('❌ Error al registrar el producto');
            window.history.back();
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('⚠️ Debes completar todos los campos');
        window.history.back();
    </script>";
}

$conexion->close();
?>
