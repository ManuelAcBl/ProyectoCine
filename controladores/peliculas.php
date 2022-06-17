<?php

use manuel\cine\Utils;
use manuel\cine\Vista;

[$id, $titulo, $sinopsis, $imagen] = Utils::input($_POST, ['id', 'titulo', 'sinopsis', 'imagen']);

switch ($accion) {
    case 'mostrar':
        //include 'modelos/pelicula.php';
        //Vista::mostrar('pelicula', ['pelicula' => $pelicula]);
        Vista::mostrar('pelicula');
        break;

    case 'editar':
        if ($id && $titulo && $sinopsis) {
            include 'modelos/pelicula_editar.php';
            header('Location: /peliculas');
        } else {
            include 'modelos/pelicula.php';
            Vista::mostrar('pelicula_editar', ['pelicula' => $pelicula]);
        }

        break;

    case 'anadir':
        include 'modelos/pelicula_anadir.php';
        header('Location: /peliculas');
        break;

    case 'eliminar':
        include 'modelos/pelicula_eliminar.php';
        header('Location: /peliculas');
        break;

    default:
        include 'modelos/peliculas.php';
        Vista::mostrar('peliculas', ['peliculas' => $peliculas]);
        break;
}
