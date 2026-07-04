<?php
session_start();
// Bloque de seguridad: deniega el acceso a usuarios no firmados
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include 'conexion.php';

// Consulta para la extracción de registros de productos
$query = "SELECT id, nombre, precio, stock FROM productos";
$tabla_productos = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo - UT Selva</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .nav-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #28a745; padding-bottom: 15px; margin-bottom: 30px; }
        .nav-header h2 { margin: 0; color: #28a745; }
        .table-data { width: 100%; border-collapse: collapse; background: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table-data th, .table-data td { padding: 12px 15px; border: 1px solid #dee2e6; text-align: left; }
        .table-data th { background-color: #28a745; color: #ffffff; }
        .table-data tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-danger { padding: 8px 16px; background-color: #dc3545; color: #ffffff; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-danger:hover { background-color: #bd2130; }
    </style>
</head>
<body>

    <div class="nav-header">
        <div>
            <h2>Sistema de Gestión Integral</h2>
            <span>Bienvenido: <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong></span>
        </div>
        <a href="logout.php" class="btn-danger">Cerrar Sesión</a>
    </div>

    <h3>Listado General de Existencias (Base de Datos)</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción del Producto</th>
                <th>Precio Unitario</th>
                <th>Stock Actual</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($tabla_productos && $tabla_productos->num_rows > 0): ?>
                <?php while ($item = $tabla_productos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                        <td>$<?php echo number_format($item['precio'], 2); ?> MXN</td>
                        <td><?php echo $item['stock']; ?> unidades</td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No se encontraron registros de datos en el sistema.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>