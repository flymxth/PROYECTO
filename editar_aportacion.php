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

// Consultar el registro actual
$consulta = "SELECT * FROM aportaciones WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado || mysqli_num_rows($resultado) === 0) {
    die("El registro no existe.");
}

// Obtener los datos del registro
$aporte = mysqli_fetch_assoc($resultado);

// Procesar la actualización si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nombre = $_POST['txtNombre'];
    $Apellidos = $_POST['txtApellidos'];
    $Telefono = $_POST['txtTelefono'];
    $Aportacion = $_POST['txtAportacion'];
    $Fecha = $_POST['dtFecha'];

    $consultaActualizar = "UPDATE aportaciones 
                           SET nombre='$Nombre', apellidos='$Apellidos', telefono='$Telefono', aportacion='$Aportacion', fecha='$Fecha' 
                           WHERE id=$id";

    if (mysqli_query($conexion, $consultaActualizar)) {
        header('Location: Aportaciones.php');
        exit;
    } else {
        die("Error al actualizar: " . mysqli_error($conexion));
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aportación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Aportación</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="txtNombre" class="form-control" value="<?= htmlspecialchars($aporte['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" id="apellidos" name="txtApellidos" class="form-control" value="<?= htmlspecialchars($aporte['apellidos']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" id="telefono" name="txtTelefono" class="form-control" value="<?= htmlspecialchars($aporte['telefono']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="aportacion" class="form-label">Lo que guste aportar</label>
            <input type="text" id="aportacion" name="txtAportacion" class="form-control" value="<?= htmlspecialchars($aporte['aportacion']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" id="fecha" name="dtFecha" class="form-control" value="<?= htmlspecialchars($aporte['fecha']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-arrow-left-right"></i> Actualizar</button>
        <a href="Aportaciones.php" class="btn btn-secondary">Cancelar <i class="bi bi-x"></i></a>
    </form>
</div>
</body>
</html>
