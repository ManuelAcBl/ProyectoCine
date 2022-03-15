<?php

use manuel\cine\DB;

DB::run('DELETE FROM peliculas WHERE id = ?', [$id]);