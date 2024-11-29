<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);
  $query = "SELECT * FROM eventos"; 
  $resultado = mysqli_query($conexion, $query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/icono.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Principal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="imagenes/icono2 (2).jpeg" width="50px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="Principal.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Aportaciones.php">Aportaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Citas.php">Citas Medicas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Campañas.html">Eventos o Campañas</a>
              </li>
            </ul>
            <form action="index.html" method="post">
              <button class="btn btn-dark" type="submit">Cerrar Sesion</button>
            </form>
          </div>
        </div>
      </nav>


      <div class="container mt-5">
        <h1>Eventos & Campañas</h1>
        <a href="agregar_cita.php" class="btn btn-success mb-3">Crear evento +</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Telefono</th>
                    <th>Informacion sobre el evento</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?= $fila['nombrecompleto'] ?></td>
                        <td><?= $fila['telefono'] ?></td>
                        <td><?= $fila['informacion'] ?></td>
                        <td><?= $fila['fecha'] ?></td>
                    <td>
                        <a href="consultar_cita.php?id=<?= $fila['id'] ?>" class="btn btn-info btn-sm">Consultar <i class="bi bi-clipboard-check-fill"></i></a>
                        <a href="editar_cita.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar <i class="bi bi-pen-fill"></i></a>
                        <a href="eliminar_cita.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar <i class="bi bi-trash3-fill"></i></a>
                    </td>
                    </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-5">
        <form action="Principal.html" method="post">
            <button type="submit" class="btn btn-dark"><i class="bi bi-box-arrow-left"></i> Salir</button>
        </form>
    </div>


</body>
</html>