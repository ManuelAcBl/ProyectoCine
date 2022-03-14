<?php

use manuel\cine\DB;

$peliculas = DB::run("SELECT * FROM peliculas");