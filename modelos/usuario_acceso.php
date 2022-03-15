<?php

use manuel\cine\DB;

$ultimo_acceso = date("Y-m-d H:i:s");

DB::run("UPDATE usuarios SET ultimo_acceso = '$ultimo_acceso' WHERE correo = '$correo'");