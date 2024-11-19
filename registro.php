<?php

    if($_POST) {
 
        $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);

        $Nombre = $_POST['txtNombre'];
        $Apellidos = $_POST['txtApellidos'];
        $NombreUsuary = $_POST['txtUsuario'];
        $Correo = $_POST['txtEmail'];
        $FechaNacimiento = $_POST['txtFecha'];
        $Contraseña = $_POST['txtPassword'];

        $Consulta = "insert into registro (nombre, apellidos, nombreusuario, correo, fecha, contrasena) values ('$Nombre', '$Apellidos', '$NombreUsuary', '$Correo', '$FechaNacimiento', '$Contraseña');"; 


        $resultado = mysqli_query($conexion, $Consulta);
        if ($resultado) {

            header("Location: Registro-Correcto.html");
            exit();
        } else {
            
            header("Location: Registro-Incorrecto.html");
            exit();
        }
        mysqli_close($conexion);
    }
    
?>