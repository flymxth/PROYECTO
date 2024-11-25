<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aportaciones</title>
</head>
<body>

<?php 
    $conexion = mysqli_connect('localhost', 'root', '', 'refugio', 3306);

    if ($_POST) {

        $Nombre = $_POST['txtNombre'];
        $Apellidos = $_POST['txtApellidos'];
        $Telefono = $_POST['txtTelefono'];
        $Aportacion = $_POST['txtAportacion'];
        $Fecha = $_POST['dtFecha'];

        $consulta = "INSERT INTO aportaciones (nombre, apellidos, telefono, aportacion, fecha) VALUES ('$Nombre', '$Apellidos', '$Telefono', '$Aportacion', '$Fecha')";

        if (mysqli_query($conexion, $consulta)) {
            header('Location: AportacionExitosa.html');
        } else {
            header('Location: AportacionNoExitosa.html');
        }
        
        
    }

    $consulta = "SELECT * FROM aportaciones";
    $resultado = mysqli_query($conexion, $consulta);
?>





<h1>Aportaciones</h1>
<div class="fondo">
    <form action="" method="post" onsubmit="return validarFormulario()">
        <p>Nombre</p>
        <input type="text" id="nombre" name="txtNombre" placeholder="Tu nombre">
        <span id="nombreError" style="color: red; display: none; font-size: 12px;">Por favor, ingresa tu nombre</span>

        <p>Apellidos</p>
        <input type="text" id="apellidos" name="txtApellidos" placeholder="Tus apellidos">
        <span id="apellidosError" style="color: red; display: none; font-size: 12px;">Por favor, ingresa tus apellidos</span>

        <p>Telefono</p>
        <input type="text" id="telefono" name="txtTelefono" placeholder="Tu telefono">
        <span id="telefonoError" style="color: red; display: none; font-size: 12px;">Por favor, ingresa tu telefono</span>

        <p>Lo que guste aportar</p>
        <input type="text" id="aportacion" name="txtAportacion" placeholder="Tu aportacion">
        <span id="aportacionError" style="color: red; display: none; font-size: 12px;">Por favor, escriba lo que quiere aportar</span>

        <p>Fecha</p>
        <p>Elija la fecha para llevar su aporte</p>
        <input type="date" id="fecha" name="dtFecha" placeholder="Fecha">
        <span id="fechaError" style="color: red; display: none; font-size: 12px;">Por favor, ingresa la fecha en la que se entregara tu aporte</span>

        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Aportación</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>

            <?php 
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>
                            <td>" . $fila['nombre'] . "</td>
                            <td>" . $fila['apellidos'] . "</td>
                            <td>" . $fila['telefono'] . "</td>
                            <td>" . $fila['aportacion'] . "</td>
                            <td>" . $fila['fecha'] . "</td>
                            <td>
                                <button type='submit' name='action' value='Editar_" . $fila['id'] . "'>Editar</button>
                                <button type='submit' name='action' value='Eliminar_" . $fila['id'] . "'>Eliminar</button>
                                <button type='submit' name='action' value='Consultar_" . $fila['id'] . "'>Consultar</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay registros</td></tr>";
            }

            mysqli_close($conexion);
            ?>
        </table>

        <input type="submit" name="action" class="buttonAgregar" value="Agregar">
    </form>
</div>
</table>

<script src="funciones/Aportaciones.js"></script>
</body>
</html>