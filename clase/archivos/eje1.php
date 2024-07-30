<?php
$nombre_directorio = "directorio";
$nombre_archivo = "archivo.txt";

if (file_exists("$nombre_directorio$nombre_archivo")) {
    echo "El archivo $nombre_archivo existe";
} else {
    echo "El archivo $nombre_archivo no existe";
}

echo "<br>";

if (is_file("$nombre_directorio$nombre_archivo")) {
    echo "El archivo $nombre_archivo es un archivo";
} else {
    echo "El archivo $nombre_archivo no es un archivo";
}

echo "<br>";

if (is_dir($nombre_directorio)) {
    echo "El directorio $nombre_directorio existe";
} else {
    echo "El directorio $nombre_directorio no existe";
}

echo "<br>";

$archivo_imagen = "imagen.jpg";

if (file_exists($archivo_imagen)) {
    echo "El archivo $archivo_imagen existe";

    $tamanio = filesize($archivo_imagen);
    $creado = filectime($archivo_imagen);
    $modificado = filemtime($archivo_imagen);

    $tamanioInMB = $tamanio / (1024 * 1024 * 1024);

    echo "<br>";

    echo "El tamaño del archivo es $tamanioInMB MB";
    echo "<br>";
    echo "El archivo fue creado el " . date("d/m/Y H:i:s", $creado);
    echo "<br>";
    echo "El archivo fue modificado el " . date("d/m/Y H:i:s", $modificado);

    // show image
    echo "<br>";
    echo "<img src='$archivo_imagen' alt='imagen' width='200' height='200'>";
} else {
    echo "El archivo $archivo_imagen no existe";
}
