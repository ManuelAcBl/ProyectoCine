<?php

use manuel\cine\DB;

$usuario = DB::run('SELECT * FROM usuarios WHERE correo = ?', [$_SESSION['usuario'] ?? ''])->fetch();