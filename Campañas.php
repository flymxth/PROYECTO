<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/icono.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="campaña.css">
    <title>Inicio Sesion</title>
</head>
<body>
    <div class="title"><h1>Inicia Sesion</h1></div>
        <div class="container">
            <div class="left"></div>
            <div class="right">
                <div class="formBox">
                    <form action="CampañaSesion.php" method="post" onsubmit="return validarFormulario()">
                        <p><i class="bi bi-person-fill"></i> Usuario</p>
                            <input type="text" id="usuario" name="txtUsuario" placeholder="Usuario">
                            <span id="usuarioError" style="color: red; display: none; font-size: 12px;">Por favor, ingresa un usuario</span>
                
                        <p><i class="bi bi-lock-fill"></i> Contraseña</p>
                            <input type="password" id="password" name="txtPassword" placeholder="Contraseña">
                            <br>
                            <span id="passwordError" style="color: red; display: none; font-size: 12px;">Por favor, ingresa una contraseña</span>
                            <br>
                            <input type="checkbox" id="chk">Ver contraseña
                            <br><br>
                            <input type="submit" name="button" value="Entrar">
                            <a href="Principal.html"><i class="bi bi-indent"></i> Salir</a>
                    </form>
                </div>
            </div>
        </div>

        <script src="funciones/ver-contraseña.js"></script>
        <script src="funciones/campos.js"></script>
</body>
</html>