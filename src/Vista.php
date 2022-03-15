<?php

namespace manuel\cine;

class Vista
{

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
    public static function mostrar(String $vista, array $datos = []): void
    {
        include 'vistas/main.php';
    }

    public static function mostrar_json(array $datos): void
    {
        print(json_encode($datos));
    }
}
