<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

require_once 'includes/funciones.php';

if (isset($_POST['submit'])) {
    if (!isset($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        echo "Por favor selecciona una imagen";
    }

    $file = $_FILES['imagen'];
    $file_temp = $file['tmp_name'];
    $image_size = getimagesize($file_temp);
    $ancho = $image_size[0];
    $alto = $image_size[1];

    $uploadFile = file_get_contents($file_temp);
    $uploadFile = addslashes($uploadFile);

    insertarImagen($alto, $ancho, $file['type'], $uploadFile, $file['name']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" id="imagen" accept="image/*">
        <input type="submit" value="Subir" name="submit">
    </form>

</body>

</html>