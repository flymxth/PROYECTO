<?php

if ($_POST) {

    $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);

    $Nombre = $_POST['txtNombre'];
    $Apellidos = $_POST['txtApellidos'];
    $NombreUsuary = $_POST['txtUsuario'];
    $Correo = $_POST['txtEmail'];
    $FechaNacimiento = $_POST['txtFecha'];
    $Contraseña = $_POST['txtPassword'];

    $checkQuery = "SELECT * FROM registro WHERE nombreusuario = '$NombreUsuary'";
    $checkResult = mysqli_query($conexion, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        header("Location: Registro-Incorrecto.html?error=usuario-existente");
        exit();
    } else {
        $Consulta = "INSERT INTO registro (nombre, apellidos, nombreusuario, correo, fecha, contrasena) 
                     VALUES ('$Nombre', '$Apellidos', '$NombreUsuary', '$Correo', '$FechaNacimiento', '$Contraseña')";

        $resultado = mysqli_query($conexion, $Consulta);

        if ($resultado) {
            header("Location: Registro-Correcto.html");
            exit();
        } else {
            header("Location: Registro-Incorrecto.html?error=fallo-al-registrar");
            exit();
        }
    }

    mysqli_close($conexion);
}
?>
