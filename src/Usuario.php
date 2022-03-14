<?php

namespace manuel\cine;

class Usuario
{
    /**
     * It sets the session variables for the user and whether they are an admin.
     * 
     * @param String usuario The username of the user to log in.
     */
    public static function iniciar_sesion(String $usuario): void
    {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['admin'] = (bool) DB::run('SELECT admin FROM Usuarios WHERE usuario = ?', [$usuario])->fetchColumn();
    }

    /**
     * Check if a session is currently active
     * 
     * @return A boolean value.
     */
    public static function sesion_iniciada(): bool
    {
        return isset($_SESSION['usuario']);
    }

    /**
     * Returns the current user's username
     * 
     * @return The name of the user logged in.
     */
    public static function usuario(): String
    {
        return $_SESSION['usuario'];
    }

    /**
     * It logs in a user.
     */
    public static function login(): void
    {
        # code...
    }

    /**
     * Returns true if the user is an admin
     * 
     * @return A boolean value.
     */
    public static function is_admin(): bool
    {
        return !empty($_SESSION['admin']);
    }

    /**
     * It returns the data of the user with the given username.
     * 
     * @param String usuario The name of the user.
     * 
     * @return An array of arrays.
     */
    public static function obtener_datos(String $usuario): array
    {
        return DB::run('SELECT * FROM Usuarios WHERE usuario = ?', [$usuario])->fetch();
    }

    /**
     * Given a username and password, return whether the password is correct
     * 
     * @param String usuario The username to check.
     * @param String contrsena The password to be verified.
     * 
     * @return Nothing.
     */
    public static function comprobar_datos(String $usuario, String $contrsena): bool
    {
        $hash = DB::run('SELECT contrasena FROM Usuarios WHERE usuario = ?', [$usuario])->fetchColumn();

        return password_verify($contrsena, $hash);
    }
}
