<?php

function conectar()
{
    // datos de conexión
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'tecweb2';


    $conection = mysqli_connect($host, $user, $pass, $db) or die('Error al conectar a la base de datos');

    if (!$conection) {
        echo 'Error al conectar a la base de datos' . mysqli_connect_error();
    } else {
        return $conection;
    }

    return $conection;
}
