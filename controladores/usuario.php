<?php

use manuel\cine\Vista;
use manuel\cine\Usuario;
use manuel\cine\Utils;

// if (!Usuario::sesion_iniciada())
//     header('Location: login');

// $usuario = Usuario::obtener_datos(Usuario::usuario());
// $admin = Usuario::is_admin();
// $editar = $accion == 'editar';

// $datos = [
//     'usuario' => $usuario,
//     'admin' => $admin,
//     'editar' => $editar
// ];

// asdasdasdasdas


[$id, $nombre, $apellidos, $telefono, $correo, $contrasena] = Utils::input($_POST, ['id', 'nombre', 'apellidos', 'telefono', 'correo', 'contrasena']);

switch ($accion) {
    case 'editar':
        if ($id && $nombre && $apellidos && $telefono && $correo) {
            include 'modelos/usuario_editar.php';
            header('Location: /usuario');
        }

        include 'modelos/usuario.php';
        Vista::mostrar('usuario_editar', ['usuario' => $usuario]);

        break;

    case 'registrar':
        if ($nombre && $apellidos && $telefono && $correo && $contrasena) {
            include 'modelos/usuario_registrar.php';
            header('Location: /usuario/iniciar');
        }

        Vista::mostrar('registro');

        break;

    case 'iniciar':
        if (Usuario::sesion_iniciada())
            header('Location: /usuario');

        if ($correo && $contrasena)
            if (Usuario::comprobar_datos($correo, $contrasena)) {
                Usuario::iniciar_sesion($correo);
                include 'modelos/usuario_acceso.php';
                header('Location: /peliculas');
            } else
                Vista::mostrar('login', ['error' => true]);
        else
            Vista::mostrar('login');

        break;

    case 'terminar':
        session_destroy();
        header('Location: /peliculas');
        break;

    case 'datos':
        include 'modelos/usuario_datos.php';
        Vista::mostrar_json($usuarios);

        break;

    case 'anadir_admin':
        include 'modelos/usuario_anadir_admin.php';
        header('Location: /usuario');

        break;

    default:
        include 'modelos/usuario.php';
        include 'modelos/usuario_datos.php';
        Vista::mostrar('usuario', ['usuario' => $usuario, 'usuarios' => $usuarios]);
        break;
}
