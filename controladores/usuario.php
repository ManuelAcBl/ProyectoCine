<?php

use manuel\cine\Vista;
use manuel\cine\Usuario;

if (!Usuario::sesion_iniciada())
    header('Location: login');

$usuario = Usuario::obtener_datos(Usuario::usuario());
$admin = Usuario::is_admin();
$editar = $action == 'editar';

$datos = [
    'usuario' => $usuario,
    'admin' => $admin,
    'editar' => $editar
];

Vista::mostrar('usuario', $datos);
