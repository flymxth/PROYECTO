<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);

// Obtener todos los registros
$consulta = "SELECT * FROM aportaciones";
$resultado = mysqli_query($conexion, $consulta);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Aportaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Aportaciones</h1>
    <a href="agregar_aportacion.php" class="btn btn-success mb-3">Agregar Registro <i class="bi bi-plus"></i></a>

    <!-- Tabla -->
    <table class="table mt-3">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Aportación</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['apellidos'] ?></td>
                <td><?= $fila['telefono'] ?></td>
                <td><?= $fila['aportacion'] ?></td>
                <td><?= $fila['fecha'] ?></td>
                <td>
                    <a href="consultar_aportacion.php?id=<?= $fila['id'] ?>" class="btn btn-info btn-sm">Consultar <i class="bi bi-clipboard-check-fill"></i></a>
                    <a href="editar_aportacion.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar <i class="bi bi-pen-fill"></i></a>
                    <a href="eliminar_aportacion.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar <i class="bi bi-trash3-fill"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Contenedor para centrar el botón -->
<div class="text-center mt-5">
    <form action="Principal.html" method="post">
        <button type="submit" class="btn btn-dark"><i class="bi bi-box-arrow-left"></i> Salir</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
