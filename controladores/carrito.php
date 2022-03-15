<?php

use manuel\cine\Carrito;
use manuel\cine\Utils;
use manuel\cine\Vista;

[$id, $unidades] = Utils::input($_POST, ['id', 'unidades']);

switch ($accion) {
    case 'anadir':
        if ($id && $unidades)
            Carrito::anadir($id, $unidades);

        header('Location: /carrito');
        break;

    case 'eliminar':
        if ($id)
            Carrito::eliminar($id);

        header('Location: /carrito');
        break;

    default:
        include 'modelos/carrito.php';
        Vista::mostrar('carrito', ['sesiones' => $sesiones]);
        break;
}

// if ($action == 'anadir' && Usuario::id_iniciada()) {
//     [$id] = Utils::input($_POST, ['id']);
// } else
//     Vista::mostrar('carrito');
