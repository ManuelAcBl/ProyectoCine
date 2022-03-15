<?php

use manuel\cine\Carrito;
use manuel\cine\Utils;

session_start();

spl_autoload_register(fn ($name) => include 'src/' . str_replace('manuel\cine', '', $name) . '.php');

// var_dump($_GET);
// var_dump($_SESSION);

//var_dump(Carrito::get());

[$accion, $valor] = Utils::input($_GET, ['action', 'valor']);
$controlador = $_GET['controller'] ?: 'peliculas';

// $controlador = $_GET['controller'] ?: 'peliculas';
// $action = $_GET['action'] ?: '';

include "controladores/$controlador.php";
