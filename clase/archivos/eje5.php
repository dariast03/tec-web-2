<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $carrera = $_POST['carrera'];

    $data = "Nombre: $nombre\nApellido: $apellido\nCarrera: $carrera\n";

    $nombre_archivo = 'datos.txt';
    touch($nombre_archivo);

    if (touch($nombre_archivo)) {
        $archivo = fopen($nombre_archivo, 'w');
        fwrite($archivo, $data);
        fclose($archivo);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Clase</title>
</head>

<body>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required><br>

        <label for="carrera">Carrera:</label>
        <input type="text" name="carrera" id="carrera" required><br>

        <input type="submit" value="Guardar" name="submit">
    </form>
</body>

</html>