<?php

use manuel\cine\Usuario;
use manuel\cine\Utils;
use manuel\cine\Vista;

if ($action == 'anadir' && Usuario::sesion_iniciada()) {
    [$sesion] = Utils::input($_POST, ['sesion']);
} else
    Vista::mostrar('carrito');
