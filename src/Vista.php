<?php

namespace manuel\cine;

class Vista
{
    /* This is a constant. It is a variable that cannot be changed. */
    public const CARPETA_VISTAS = 'vistas';

    /**
     * The function takes a string and an array as parameters. 
     * It checks if the file exists in the views folder. 
     * If it does, it loads the file and returns true. 
     * If it doesn't, it returns false
     * 
     * @param String nombre The name of the view file to be rendered.
     * @param array datos an array of data to be passed to the view.
     * 
     * @return Nothing.
     */
    public static function mostrar(String $nombre, array $datos = []): bool
    {
        $archivo = self::CARPETA_VISTAS . "/$nombre.php";

        return file_exists($archivo) && require $archivo;
    }
}
