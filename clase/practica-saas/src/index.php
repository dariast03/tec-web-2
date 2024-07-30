<?php
require_once 'includes/funciones.php';

$usuarios = listarUsuarios();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: blue;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #FFF;
        }

        .nav-links {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        main {
            min-height: 86vh;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }

        .lista {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <?php include('./encabezado.php'); ?>
    <main>
        <div class="lista">
            <?php foreach ($usuarios as $usuario) : ?>
                <div class="card">
                    <img src="https://htmlstream.com/preview/unify-v2.6/assets/img-temp/400x450/img5.jpg" alt="John" style="width:100%">
                    <h1><?php echo $usuario['nombre'] ?></h1>
                    <p class="title"><?php echo $usuario['apellido'] ?></p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button><?php echo $usuario['telefono'] ?></button></p>
                </div>
            <?php endforeach; ?>
        </div>


        <!--     <?php include('./usuario.php'); ?> -->
    </main>
    <?php include('./pie.php'); ?>
</body>