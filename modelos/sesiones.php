<?php

use manuel\cine\DB;

$sql = "SELECT id, sala, precio, DATE_FORMAT(fecha, '%H:%i') AS hora FROM sesiones WHERE pelicula = ? AND fecha BETWEEN '$fecha 00:00:00' AND '$fecha 23:59:59'";

$sesiones = DB::run($sql, [$id_pelicula])->fetchAll(PDO::FETCH_ASSOC);

//var_dump($sesiones);