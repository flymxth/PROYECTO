<?php

    $conexion = mysqli_connect('Localhost', 'root', '', 'refugio', 3306);
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    // Verificar si se proporcionó un ID
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("No se proporcionó un ID válido.");
    }
    
    // Obtener el ID del registro
    $id = intval($_GET['id']);
    
    // Eliminar el registro
    $consulta = "DELETE FROM citas WHERE id = $id";
    if (mysqli_query($conexion, $consulta)) {
        header('Location: Citas.php'); // Redirigir a la página principal
        exit;
    } else {
        die("Error al eliminar: " . mysqli_error($conexion));
    }
    
    mysqli_close($conexion);
    

?>