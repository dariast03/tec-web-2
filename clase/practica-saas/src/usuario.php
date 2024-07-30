<?php
require_once('./includes/funciones.php');

if (isset($_POST['submit'])) {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $telefono = trim($_POST["telefono"]);

    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (strlen($nombre) > 20) {
        $errores[] = "El nombre no debe tener más de 20 caracteres.";
    }

    if (empty($apellido)) {
        $errores[] = "El apellido es obligatorio.";
    } elseif (strlen($apellido) > 20) {
        $errores[] = "El apellido no debe tener más de 20 caracteres.";
    }

    if (empty($telefono)) {
        $errores[] = "El teléfono es obligatorio.";
    } elseif (strlen($telefono) != 8) {
        $errores[] = "El teléfono debe tener exactamente 8 caracteres.";
    }

    if (empty($errores)) {
        insertarUsuario($nombre, $apellido, $telefono);
        echo "TRUE";
    } else {
        echo "<h1>Errores en el formulario</h1>";
        foreach ($errores as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
    }
}
?>

<form action="" method="post">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value=""><br><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" id="apellido" name="apellido"><br><br>

    <label for="telefono">Teléfono:</label><br>
    <input type="text" id="telefono" name="telefono"><br><br>

    <input type="submit" value="Enviar" name="submit">
</form>