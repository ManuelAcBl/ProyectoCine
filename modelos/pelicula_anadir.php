<?php

use manuel\cine\DB;

DB::run('INSERT INTO peliculas (id, titulo, sinopsis, imagen) VALUES (null, ?, ?, "defecto.jpg")', [$titulo, $sinopsis]);