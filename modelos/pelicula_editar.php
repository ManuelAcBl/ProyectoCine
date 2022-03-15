<?php

use manuel\cine\DB;

DB::run('UPDATE peliculas SET titulo = ?, sinopsis = ? WHERE id = ?', [$titulo, $sinopsis, $id]);