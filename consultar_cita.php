<?php

    $conexion = mysqli_connect('Localhost', 'root', '', 'refugio', 3306);

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("No se proporcionó un ID válido.");
    }

    $id = intval($_GET['id']);

    $consulta = "SELECT * FROM citas WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado || mysqli_num_rows($resultado) === 0) {
        die("El registro no existe.");
    }

    $aporte = mysqli_fetch_assoc($resultado);

    mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h1>Detalles de tu cita</h1>
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
            <th>Nombre Mascota</th>
            <td><?= htmlspecialchars($aporte['nombremascota']) ?></td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td><?= htmlspecialchars($aporte['sexo']) ?></td>
        </tr>
        <tr>
            <th>Raza</th>
            <td><?= htmlspecialchars($aporte['raza']) ?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?= htmlspecialchars($aporte['edad']) ?></td>
        </tr>
    </table>
    <a href="Citas.php" class="btn btn-primary"><i class="bi bi-arrow-bar-left"></i> Volver</a>
</div>

</body>
</html>