<?php

use manuel\cine\Utils;
use manuel\cine\DB;

[$nombre, $apellidos, $dni, $telefono, $correo, $usuario] =
    Utils::input($_POST, ['nombre', 'apellidos', 'dni', 'telefono', 'correo', 'usuario']);

if ($nombre && $apellidos && $dni && $telefono && $correo && $usuario)
    DB::run(
        'UPDATE Usuarios SET nombre = ?, apellidos = ?, dni = ?, telefono = ?, correo = ? WHERE usuario = ?',
        [$nombre, $apellidos, $dni, $telefono, $correo, $usuario]
    );

header('Location: usuario');
