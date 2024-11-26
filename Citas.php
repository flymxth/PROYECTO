<?php

    $conexion = mysqli_connect('Localhost', 'root', '', 'refugio', 3306);

    $consulta = "SELECT * FROM citas";
    $resultado = mysqli_query($conexion, $consulta);

    mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendador de citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agendar Cita</h1>
        <a href="agendar_cita.php" class="btn btn-success mb-3">Agendar cita <i class="bi bi-plus"></i></a>
    </div>

    <table class="table mt-3">
            <tbody>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Nombre Macota</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Raza</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </tbody>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['apellidos'] ?></td>
                        <td><?= $fila['telefono'] ?></td>
                        <td><?= $fila['nombre-mascota'] ?></td>
                        <td><?= $fila['sexo'] ?></td>
                        <td><?= $fila['edad'] ?></td>
                        <td><?= $fila['raza'] ?></td>
                        <td>
                            <a href="consultar_cita.php?id=<?= $fila['id'] ?>" class="btn btn-info btn-sm">Consultar <i class="bi bi-clipboard-check-fill"></i></a>
                            <a href="editar_cita.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar <i class="bi bi-pen-fill"></i></a>
                            <a href="eliminar_cita.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar <i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
    </table>


    <div class="text-center mt-5">
        <form action="Principal.html" method="post">
            <button type="submit" class="btn btn-dark"><i class="bi bi-box-arrow-left"></i> Salir</button>
        </form>
    </div>
</body>
</html>