<?php

$nombre_archivo = "prueba.txt";
echo touch($nombre_archivo) ? "Archivo creado" : "No se pudo crear el archivo";
echo "<br>";

$archivo = fopen($nombre_archivo, "a");

if (touch($nombre_archivo)) {
    fwrite($archivo, "Hola mundo\n");
    fwrite($archivo, "Hola mundo\n");
    fwrite($archivo, "Hola mundo\n");
    fwrite($archivo, "Hola mundo\n");
    fclose($archivo);
}

$datos = fopen($nombre_archivo, "r");

while (!feof($datos)) {
    echo fgets($datos) . "<br>";
}
