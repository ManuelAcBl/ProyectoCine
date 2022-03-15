<?php

use manuel\cine\DB;

$usuarios = DB::run('SELECT * FROM usuarios ORDER BY ?', [$valor])->fetchAll();