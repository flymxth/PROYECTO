<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se proporcionó un ID válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("No se proporcionó un ID válido.");
}

// Obtener el ID del registro
$id = intval($_GET['id']);

// Consultar los datos actuales de la cita
$consulta = "SELECT * FROM citas WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado || mysqli_num_rows($resultado) === 0) {
    die("El registro no existe.");
}

// Obtener los datos de la cita
$cita = mysqli_fetch_assoc($resultado);

// Procesar la actualización si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['txtNombre']);
    $apellidos = mysqli_real_escape_string($conexion, $_POST['txtApellidos']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['txtTelefono']);
    $nombreMascota = mysqli_real_escape_string($conexion, $_POST['txtNombreMascota']);
    $sexo = mysqli_real_escape_string($conexion, $_POST['txtSexo']);
    $raza = mysqli_real_escape_string($conexion, $_POST['txtRaza']);
    $edad = mysqli_real_escape_string($conexion, $_POST['txtEdad']);

    $consultaActualizar = "UPDATE citas 
                           SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', nombremascota='$nombreMascota', sexo='$sexo', raza='$raza', edad='$edad' 
                           WHERE id=$id";

    if (mysqli_query($conexion, $consultaActualizar)) {
        header('Location: citas.php'); // Redirige de vuelta a la lista de citas
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Cita</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="txtNombre" class="form-label">Nombre</label>
            <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?= htmlspecialchars($cita['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="txtApellidos" class="form-label">Apellidos</label>
            <input type="text" id="txtApellidos" name="txtApellidos" class="form-control" value="<?= htmlspecialchars($cita['apellidos']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="txtTelefono" class="form-label">Teléfono</label>
            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" value="<?= htmlspecialchars($cita['telefono']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="txtNombreMascota" class="form-label">Nombre de la Mascota</label>
            <input type="text" id="txtNombreMascota" name="txtNombreMascota" class="form-control" value="<?= htmlspecialchars($cita['nombremascota']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="txtSexo" class="form-label">Sexo</label>
            <input type="text" id="txtSexo" name="txtSexo" class="form-control" value="<?= htmlspecialchars($cita['sexo']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="txtRaza" class="form-label">Raza</label>
            <input type="text" id="txtRaza" name="txtRaza" class="form-control" value="<?= htmlspecialchars($cita['raza']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="txtEdad" class="form-label">Edad</label>
            <input type="text" id="txtEdad" name="txtEdad" class="form-control" value="<?= htmlspecialchars($cita['edad']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Guardar cambios</button>
        <a href="citas.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>
