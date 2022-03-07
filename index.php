<?php

use manuel\cine\Config;
use manuel\cine\Utils;

session_start();

spl_autoload_register(fn ($name) => include 'src/' . str_replace('manuel\cine', '', $name) . '.php');

var_dump($_GET);
var_dump($_SESSION);

$controlador = $_GET['controller'] ?: 'index';
$action = $_GET['action'] ?: '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= Utils::PROJECT_URL ?>vistas/css/header.css">
    <link rel="stylesheet" href="<?= Utils::PROJECT_URL ?>vistas/css/footer.css">
    <title>MiCine</title>
</head>

<body>
    <header>
        <?php include 'vistas/header.php' ?>
    </header>

    <main>
        <?php include "controladores/$controlador.php" ?>
    </main>

    <footer>
        <?php include 'vistas/footer.php' ?>
    </footer>
</body>

</html>