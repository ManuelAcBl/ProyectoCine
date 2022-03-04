<?php

namespace manuel\cine;

class Vista
{
    public const VISTAS = Utils::PROJECT_ROOT . '/vistas';

    public static function mostrar(String $nombre, array $datos = []): bool
    {
        $archivo = self::VISTAS . "/$nombre.php";

        $datos = $datos;

        return file_exists($archivo) && require $archivo;
    }
}
