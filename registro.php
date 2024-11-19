<?php

if ($_POST) {
    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $Nombre = $_POST['txtNombre'];
    $Apellidos = $_POST['txtApellidos'];
    $NombreUsuary = $_POST['txtUsuario'];
    $Correo = $_POST['txtEmail'];
    $FechaNacimiento = $_POST['txtFecha'];
    $Contraseña = $_POST['txtPassword'];

    // Verificar si el nombre de usuario ya existe
    $checkQuery = "SELECT * FROM registro WHERE nombreusuario = '$NombreUsuary'";
    $checkResult = mysqli_query($conexion, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Si el nombre de usuario ya existe, redirigir a la página de error
        header("Location: Registro-Incorrecto.html?error=usuario-existente");
        exit();
    } else {
        // Si el nombre de usuario no existe, proceder con la inserción
        $Consulta = "INSERT INTO registro (nombre, apellidos, nombreusuario, correo, fecha, contrasena) 
                     VALUES ('$Nombre', '$Apellidos', '$NombreUsuary', '$Correo', '$FechaNacimiento', '$Contraseña')";

        $resultado = mysqli_query($conexion, $Consulta);

        if ($resultado) {
            // Si la inserción fue exitosa, redirigir a la página de éxito
            header("Location: Registro-Correcto.html");
            exit();
        } else {
            // Si hubo un error en la inserción, redirigir a la página de error
            header("Location: Registro-Incorrecto.html?error=fallo-al-registrar");
            exit();
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
