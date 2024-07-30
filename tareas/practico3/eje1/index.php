<?php
function validarNombre($nombre)
{
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";

    for ($i = 0; $i < strlen($nombre); $i++) {
        if (strpos($permitidos, $nombre[$i]) === false) {
            return false;
        }
    }
    return true;
}

function validarDescripcion($descripcion)
{
    return strlen($descripcion) >= 50;
}

function validarTamanioArchivo($archivo)
{
    $tamanoMaximo = 5 * 1024 * 1024;

    return $archivo['size'] <= $tamanoMaximo;
}

function validarExtensionArchivo($archivo)
{
    $extensionesPermitidas = ['pdf', 'docx'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    return in_array($extension, $extensionesPermitidas);
}

if ($_POST['submit']) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $documento = $_FILES['documento'];

    $errores = [];

    if (empty($nombre)) {
        $errores['nombre'][] = "El nombre del proyecto no debe estar vacio";
    } else {
        if (!validarNombre($nombre)) {
            $errores['nombre'][] = "El nombre del proyecto solo debe contener letras, números y espacios.";
        }
    }

    if (empty($descripcion)) {
        $errores['descripcion'][] = "La descripcion del proyecto no debe estar vacio";
    } else {
        if (!validarDescripcion($descripcion)) {
            $errores['descripcion'][] = "La descripción del proyecto debe tener un mínimo de 50 caracteres.";
        }
    }

    if (empty($documento['name'])) {
        $errores['documento'][] = "El documento del proyecto es obligatorio.";
    } else {
        if (!validarTamanioArchivo($documento)) {
            $errores['documento'][] = "El documento del proyecto debe ser un archivo no debe exceder los 5 MB.";
        }

        if (!validarExtensionArchivo($documento)) {
            $errores['documento'][] = "El documento del proyecto debe ser un archivo PDF o DOCX.";
        }
    }

    if (empty($errores)) {
        $directorioSubida = 'practica_3/';
        if (!is_dir($directorioSubida)) {
            mkdir($directorioSubida);
        }

        $nombreUnico = $nombre . '_' . date('YmdHis') . '.' . pathinfo($documento['name'], PATHINFO_EXTENSION);
        $rutaSubida = $directorioSubida . $nombreUnico;

        if (move_uploaded_file($documento['tmp_name'], $rutaSubida)) {
            $exito = true;
            unset($_POST);
        } else {
            $exito = false;
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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="card card-body">
            <h2 class="my-4 text-center">PROYECTOS</h2>
            <form method="post" enctype="multipart/form-data">
                <?php if (isset($exito)) : ?>
                    <?php if ($exito) : ?>
                        <div class="alert alert-success" role="alert">
                            Proyecto creado con éxito.
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            Ha ocurrido un error al subir el archivo.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?php echo isset($errores['nombre']) ? 'is-invalid' : ''; ?>" id="floatingNombre" name="nombre" placeholder="Nombre del Proyecto" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">
                    <label for="floatingNombre">Nombre:</label>
                    <?php if (isset($errores['nombre'])) : ?>
                        <?php foreach ($errores['nombre'] as $error) : ?>
                            <div class="invalid-feedback"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control <?php echo isset($errores['descripcion']) ? 'is-invalid' : ''; ?>" id="descripcion" name="descripcion" placeholder="Descripción del Proyecto"><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : '' ?></textarea>
                    <label for="descripcion">Descripción:</label>
                    <?php if (isset($errores['descripcion'])) : ?>
                        <?php foreach ($errores['descripcion'] as $error) : ?>
                            <div class="invalid-feedback"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="documento" class="form-label">Documento:</label>
                    <input type="file" class="form-control <?php echo isset($errores['documento']) ? 'is-invalid' : ''; ?>" id="documento" name="documento">
                    <?php if (isset($errores['documento'])) : ?>
                        <?php foreach ($errores['documento'] as $error) : ?>
                            <div class="invalid-feedback"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <input type="submit" class="btn btn-primary w-100" name="submit" value="Crear">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>