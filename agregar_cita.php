<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);

        $Nombre = $_POST['txtNombre'];
        $Apellidos = $_POST['txtApellidos'];
        $Telefono = $_POST['txtTelefono'];
        $NombreM = $_POST['txtNombreM'];
        $Sexo = $_POST['txtSexo'];
        $Raza = $_POST['txtRaza'];
        $Edad = $_POST['txtEdad'];

        $consulta = "insert into citas (nombre, apellidos, telefono, nombremascota, sexo, raza, edad) values ('$Nombre', '$Apellidos', '$Telefono', '$NombreM', '$Sexo', '$Raza', '$Edad')";

        if (mysqli_query($conexion, $consulta)) {
            header('Location: Citas.php');
        } 
        
        else {
            die("Error al agregar: " . mysqli_error($conexion));
        }
    
        mysqli_close($conexion);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Agregar Cita</title> 
</head>
<body>
    <div class="container mt-5">
        <h1>Agendar Cita</h1>
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
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" id="telefono" name="txtTelefono" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombremascota" class="form-label">Nombre Mascota</label>
                <input type="text" id="nombremascota" name="txtNombreM" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="text" id="sexo" name="txtSexo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="raza" class="form-label">Raza y Animal</label>
                <input type="text" id="raza" name="txtRaza" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" id="edad" name="txtEdad" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-in-down"></i> Guardar</button>
        <a href="Citas.php" class="btn btn-secondary">Cancelar <i class="bi bi-x"></i></a>
        </form>
    </div>
</body>
</html>