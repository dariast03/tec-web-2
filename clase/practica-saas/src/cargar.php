<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

require_once("includes/funciones.php");

function importarData()
{
    $archivo = fopen("datos.csv", "r");
    $data = [];

    while (!feof($archivo)) {
        $linea = fgetcsv($archivo);
        insertPregunta($linea[1], $linea[2], $linea[3], $linea[4], $linea[5]);
    }

    fclose($archivo);
    return $data;
}

importarData();
