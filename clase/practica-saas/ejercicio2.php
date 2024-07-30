<?php
$usuario = "";
$contrasena = "";
$recordar = false;

if (isset($_POST['submit'])) {
    $usuario = $_POST['nombre'];
    $contrasena = $_POST['password'];
    $recordar = isset($_POST['recordar']);

    if ($recordar) {
        $valor = $usuario . "|" . $contrasena;
        $fecha = time() + (60 * 60 * 24);
        setcookie('galleta', $valor, $fecha);
    } else {
        setcookie('galleta', '', time()  + (60 * 60 * 24));
    }
}

if (!isset($_POST['submit']) && isset($_COOKIE['galleta'])) {
    $datos_arr = explode("|", $_COOKIE['galleta']);
    var_dump($datos_arr);
    $contrasena = $datos_arr[1];
    $recordar = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de inicio de sesión</title>
</head>

<body>
    <form action="" method="post">
        <label for="nombre">Usuario:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $usuario; ?>"><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="<?php echo $contrasena; ?>"><br><br>

        <label for="recordar">
            <input type="checkbox" name="recordar" id="recordar" <?php echo $recordar ? 'checked' : ''; ?>>
            Recordar credenciales
        </label><br><br>

        <input type="submit" value="Iniciar sesións" name="submit">
    </form>
</body>

</html>