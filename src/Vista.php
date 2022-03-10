<?php

namespace manuel\cine;

class Vista
{
    public const CARPETA_VISTAS = 'vistas';

    public static function mostrar(String $nombre, array $datos = []): bool
    {
        $archivo = self::CARPETA_VISTAS . "/$nombre.php";

        return file_exists($archivo) && require $archivo;
    }
}
