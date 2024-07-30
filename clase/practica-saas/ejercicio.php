<?php
if (isset($_POST['nombre'])) {
    $nombre = "galleta";
    $valor = $_POST["nombre"] . "|" . $_POST["password"];
    // 60 minutos, 60 segundos, 24 horas
    $fecha = time() + (60 * 60 * 24);
    setcookie($nombre, $valor, $fecha);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Cookies</title>
</head>

<body>
    <form action="" method="post">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="password">password</label>
        <input type="text" name="password" id="password">

        <input type="submit" value="enviar">

        <?php
        if (isset($_COOKIE['galleta'])) {
            echo "Hola " . $_COOKIE['galleta'];
        }
        ?>
    </form>

</body>

</html>