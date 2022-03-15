<?php

use manuel\cine\DB;

DB::run('UPDATE usuarios SET admin = 1 WHERE correo = ?', [$correo]);