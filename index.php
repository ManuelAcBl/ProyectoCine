<?php

use manuel\cine\Config;

spl_autoload_register(fn ($name) => include 'src/' . str_replace('manuel\cine', '', $name) . '.php');

$ruta = explode('/', $_GET['ruta'] ?? '');

$controlador = "controladores/$ruta[0].php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'vistas/header.php' ?>

    <?php include file_exists($controlador) ? $controlador : 'vistas/404.php' ?>

    <?php include 'vistas/footer.php' ?>
</body>

</html>