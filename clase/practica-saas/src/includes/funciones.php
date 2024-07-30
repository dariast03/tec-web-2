<?php
require_once __DIR__ . "/conexion.php";

$con = conectar();

function insertarUsuario($nombre, $apellido, $telefono)
{
    $conection = conectar();
    $sql = "INSERT INTO usuario (nombre, apellido, telefono) VALUES ('$nombre', '$apellido', '$telefono')";
    $result = mysqli_query($conection, $sql);
    var_dump($result);
    if ($result) {
        echo "Usuario insertado correctamente.";
    } else {
        echo "Error al insertar usuario.";
    }
}

function listarUsuarios()
{
    $conection = conectar();
    $sql = "SELECT * FROM usuario";
    $result = mysqli_query($conection, $sql);
    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}


function insertPregunta($pregunta, $respuesta1, $respuesta2, $acierto, $estado)
{
    $conection = conectar();
    $sql = "INSERT INTO pregunta (descripcion,respuesta1,respuesta2,acierto,estado) VALUES ('$pregunta', '$respuesta1', '$respuesta2', $acierto, $estado)";
    $result = mysqli_query($conection, $sql);

    if ($result) {
        echo "Pregunta insertada correctamente.";
    } else {
        echo "Error al insertar pregunta.";
    }
}


function insertarImagen($alto, $ancho, $tipo, $imagen, $nombre)
{
    $conection = conectar();
    $sql = "INSERT INTO imagenes (ancho, altura, tipo, imagen, nombre) VALUES ($alto, $ancho, '$tipo', '$imagen', '$nombre')";
    $result = mysqli_query($conection, $sql);

    if ($result) {
        echo "Imagen insertada correctamente.";
    } else {
        echo "Error al insertar imagen.";
    }
}
