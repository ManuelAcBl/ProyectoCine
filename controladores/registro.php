<?php

use manuel\cine\Utils;
use manuel\cine\Vista;

[$nombre, $apellidos, $dni, $telefono, $correo, $usuario] =
    Utils::input($_POST, ['nombre', 'apellidos', 'dni', 'telefono', 'correo', 'usuario']);

if ($nombre && $apellidos && $dni && $telefono && $correo && $usuario)
    DB::run(
        'INSERT INTO Usuarios',
        [$nombre, $apellidos, $dni, $telefono, $correo, $usuario]
    );

Vista::mostrar('registro');
