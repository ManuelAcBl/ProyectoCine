<?php

use manuel\cine\Utils;
use manuel\cine\Vista;

[$id_pelicula, $fecha] = Utils::input($_GET, ['id_pelicula', 'fecha']);

include 'modelos/sesiones.php';

Vista::mostrar_json($sesiones);