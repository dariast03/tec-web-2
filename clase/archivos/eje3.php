<?php
function validarNombre($nombre)
{
    return strlen($nombre) > 5;
}

function validarExpediente($archivo)
{
    $tiposPermitidos = ['application/pdf'];
    $tamanoMaximo = 10 * 1024 * 1024;

    return in_array($archivo['type'], $tiposPermitidos) && $archivo['size'] <= $tamanoMaximo;
}

function validarFoto($archivo)
{
    $tiposPermitidos = ['image/png'];
    $tamanoMaximo = 2 * 1024 * 1024;

    return in_array($archivo['type'], $tiposPermitidos) && $archivo['size'] <= $tamanoMaximo;
}

if ($_POST['submit']) {
    $nombre = $_POST['nombre'];
    $foto = $_FILES['foto'];
    $expediente = $_FILES['expediente'];

    $errores = [];

    if (!validarNombre($nombre)) {
        $errores['nombre'] = "El nombre del proyecto solo debe contener letras, números y espacios.";
    }


    if (!validarFoto($foto)) {
        $errores['foto'] = "La foto debe ser png y de 2mb";
    }


    if (!validarExpediente($expediente)) {
        echo $expediente['type'];
        $errores['expediente'] = "El expediente debe ser pdf y de 10mb.";
    }

    if (empty($errores)) {

        $file_img = $foto['tmp_name'];
        $image_data = file_get_contents($file_img);
        $image_base64 = base64_encode($image_data);
        $image_mime = mime_content_type($file_img);
        $image_src = "data:$image_mime;base64,$image_base64";


        echo "   <style>
        img {
            display: block;
            width: 100%;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
    </style>";

        echo "<h1>BIENVENIDO</h1>";

        echo "<div class='grid'>";
        $file_img = $foto['tmp_name'];

        echo "<img src='$image_src' alt='foto' width='200' height='200'>";
        echo "<div>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Imagen: " . $expediente['name'] . "</p>";
        echo "<p>Pdf: " . $expediente['name'] . "</p>";
        echo "</div>";

        echo "</div>";

        exit;
    } else {
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practico 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        img {
            display: block;
            width: 100%;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
    </style>
</head>

<body>
    <h2>EXPENDIENTE</h2>

    <form method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto">
        <br><br>

        <label for="expediente">Expediente:</label>
        <input type="file" id="expediente" name="expediente">

        <br><br>
        <input type="submit" value="Subir " name="submit">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>