<?php

use manuel\cine\DB;

function comprobar_datos(String $usuario, String $contrsena): bool
{
    $hash = DB::run('SELECT contrasena FROM Usuarios WHERE nombre = ?', [$usuario])->fetchColumn();

    return password_verify($contrsena, $hash);
}


