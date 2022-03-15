<?php

use manuel\cine\DB;

$sql = 'UPDATE usuarios SET nombre = ?, apellidos = ?, telefono = ?, correo = ? WHERE id = ?';

DB::run($sql, [$nombre, $apellidos, $telefono, $correo, $id]);