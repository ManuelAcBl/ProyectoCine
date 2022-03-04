<?php

use manuel\cine\Vista;

$usuario = ['nombre' => 'Manuel', 'apellidos' => 'Acuña Blanco', 'dni' => '12345678E', 'telefono' => '123456789'];

Vista::mostrar('usuario', $usuario);