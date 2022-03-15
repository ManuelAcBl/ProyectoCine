<?php

namespace manuel\cine;

class Carrito
{
    public static function anadir(Int $sesion, Int $unidades): void
    {
        $_SESSION['carrito'][$sesion] += $unidades;
    }

    public static function eliminar(Int $sesion): void
    {
        unset($_SESSION['carrito'][$sesion]);
    }

    // public static function eliminar(Int $sesion, Int $unidades): void
    // {
    //     $_SESSION['carrito'][$sesion] -= $unidades;

    //     if ($_SESSION['carrito'][$sesion] <= 0)
    //         unset($_SESSION['carrito'][$sesion]);
    // }

    public static function get(): array
    {
        return $_SESSION['carrito'] ?? [];
    }

    public function borrar()
    {
        unset($_SESSION['carrito']);
    }
}
