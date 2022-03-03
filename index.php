<?php

use manuel\cine\Config;

session_start();

spl_autoload_register(fn ($name) => include 'src/' . str_replace('manuel\cine', '', $name) . '.php');

var_dump($_GET);

$ruta = explode('/', $_GET['ruta'] ?? '');

$controlador = "controladores/$ruta[0].php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vistas/css/header.css">
    <title>MiCine</title>
</head>

<body>
    <header>
        <?php include 'vistas/header.php' ?>
    </header>

    <main>
        <?php include file_exists($controlador) ? $controlador : 'vistas/404.php' ?>
    </main>

    <footer>
        <?php include 'vistas/footer.php' ?>
    </footer>
</body>

</html>