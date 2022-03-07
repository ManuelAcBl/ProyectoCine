<?php

namespace manuel\cine;

class Usuario
{
    public static function iniciar_sesion(String $usuario): void
    {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['admin'] = (bool) DB::run('SELECT admin FROM Usuarios WHERE usuario = ?', [$usuario])->fetchColumn();
    }

    public static function sesion_iniciada(): bool
    {
        return isset($_SESSION['usuario']);
    }

    public static function usuario(): String
    {
        return $_SESSION['usuario'];
    }

    public static function login(): void
    {
        # code...
    }

    public static function is_admin(): bool
    {
        return !empty($_SESSION['admin']);
    }

    public static function obtener_datos(String $usuario): array
    {
        return DB::run('SELECT * FROM Usuarios WHERE usuario = ?', [$usuario])->fetch();
    }

    public static function comprobar_datos(String $usuario, String $contrsena): bool
    {
        $hash = DB::run('SELECT contrasena FROM Usuarios WHERE usuario = ?', [$usuario])->fetchColumn();

        return password_verify($contrsena, $hash);
    }
}
