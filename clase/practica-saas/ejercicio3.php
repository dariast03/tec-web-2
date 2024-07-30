<?php

if (isset($_POST['nombre'])) {
    $nombre = "galleta";
    $valor = $_POST['nombre'] . "|" . $_POST['password'];
    $fecha = time() + (60 * 60 * 24);
    setcookie($nombre, $valor, $fecha);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="nombre" id="">
        <input type="text" name="password" id="" value="<?php echo (isset($_POST['recordar'])) ? $contrasena : "" ?>">
        <input type="checkbox" name="recordar" id="">
        <p>
            <?php
            if (isset($_COOKIE['galleta'])) {
                $datos = $_COOKIE['galleta'];
                $datos_array = explode("|", $datos);
                $usuario = $datos_array[0];
                $contrasena = $datos_array[1];
                echo $usuario;
            }

            ?>
        </p>
        <input type="submit" value="enviar">
    </form>
</body>

</html>