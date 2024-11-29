<?php
    if ($_POST) {

        $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);

        $Nombre = $_POST['txtNombre'];
        $Apellidos = $_POST['txtApellidos'];
        $NombreUsuary = $_POST['txtUsuario'];
        $Correo = $_POST['txtEmail'];
        $FechaNacimiento = $_POST['txtFecha'];
        $Contraseña = $_POST['txtPassword'];

        $consulta = "SELECT * FROM registro WHERE nombreusuario = '$NombreUsuary' AND contrasena = '$Contraseña'";

        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) > 0) {

            header("Location: SubirEventos.php");
            exit();
        
        } else {
            
            header("Location: CampañasUsuarioNotExist.html");
            exit();
        }

        mysqli_close($conexion);
    }
?>