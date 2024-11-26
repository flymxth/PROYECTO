<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se proporcionó un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("No se proporcionó un ID válido.");
}

// Obtener el ID del registro
$id = intval($_GET['id']);

// Consultar el registro en la base de datos
$consulta = "SELECT * FROM aportaciones WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

// Verificar si existe el registro
if (!$resultado || mysqli_num_rows($resultado) === 0) {
    die("El registro no existe.");
}

// Obtener los datos del registro
$aporte = mysqli_fetch_assoc($resultado);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Aportación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Detalles de la Aportación</h1>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <td><?= htmlspecialchars($aporte['nombre']) ?></td>
        </tr>
        <tr>
            <th>Apellidos</th>
            <td><?= htmlspecialchars($aporte['apellidos']) ?></td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td><?= htmlspecialchars($aporte['telefono']) ?></td>
        </tr>
        <tr>
            <th>Aportación</th>
            <td><?= htmlspecialchars($aporte['aportacion']) ?></td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td><?= htmlspecialchars($aporte['fecha']) ?></td>
        </tr>
    </table>
    <a href="Aportaciones.php" class="btn btn-primary"><i class="bi bi-arrow-bar-left"></i> Volver</a>
</div>
</body>
</html>
