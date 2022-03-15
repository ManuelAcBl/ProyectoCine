<?php

use manuel\cine\Carrito;
use manuel\cine\DB;

$sesiones = [];

foreach (Carrito::get() as $id_sesion => $unidades) {
    $sesion = datos_sesion($id_sesion);
    $sesion['unidades'] = $unidades;

    $sesiones[] = $sesion;
}

function datos_sesion($id): array
{
    $sql = 'SELECT sesiones.id, peliculas.titulo, sesiones.sala, sesiones.precio, DATE_FORMAT(sesiones.fecha, "%d %M %H:%i") AS fecha
        FROM sesiones JOIN peliculas ON sesiones.pelicula = peliculas.id
        WHERE sesiones.id = ?';

    return DB::run($sql, [$id])->fetch(\PDO::FETCH_ASSOC);
}
