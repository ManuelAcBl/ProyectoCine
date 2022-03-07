<?php

use manuel\cine\Usuario;
use manuel\cine\Utils;
use manuel\cine\Vista;

const REDIRECT = "index";

if (Usuario::sesion_iniciada())
    header('Location: ' . REDIRECT);

[$usuario, $contrasena] = Utils::input($_POST, ['usuario', 'contrasena']);

if ($usuario && $contrasena)
    if (Usuario::comprobar_datos($usuario, $contrasena)) {
        Usuario::iniciar_sesion($usuario);
        header('Location: ' . REDIRECT);
    } else
        Vista::mostrar('login', ['error' => true]);
else
    Vista::mostrar('login');
