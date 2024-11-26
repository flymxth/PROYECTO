<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $Nombre = $_POST['txtNombre'];
    $Apellidos = $_POST['txtApellidos'];
    $Telefono = $_POST['txtTelefono'];
    $Aportacion = $_POST['txtAportacion'];
    $Fecha = $_POST['dtFecha'];

    $consulta = "INSERT INTO aportaciones (nombre, apellidos, telefono, aportacion, fecha) VALUES ('$Nombre', '$Apellidos', '$Telefono', '$Aportacion', '$Fecha')";
    if (mysqli_query($conexion, $consulta)) {
        // Cambiamos la redirección a la página "Aportaciones.php"
        header('Location: Aportaciones.php');
    } else {
        die("Error al agregar: " . mysqli_error($conexion));
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Aportación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Agregar Aportación</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="txtNombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" id="apellidos" name="txtApellidos" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" id="telefono" name="txtTelefono" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="aportacion" class="form-label">Lo que guste aportar</label>
            <input type="text" id="aportacion" name="txtAportacion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" id="fecha" name="dtFecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-in-down"></i> Guardar</button>
        <a href="Aportaciones.php" class="btn btn-secondary">Cancelar <i class="bi bi-x"></i></a>
    </form>
</div>
</body>
</html>
