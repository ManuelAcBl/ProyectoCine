<?php

use manuel\cine\DB;

$sql = 'INSERT INTO usuarios (nombre, apellidos, telefono, correo, contrasena) VALUES (?, ?, ?, ?, ?)';

DB::run($sql, [$nombre, $apellidos, $telefono, $correo, password_hash($contrasena, PASSWORD_BCRYPT)]);
