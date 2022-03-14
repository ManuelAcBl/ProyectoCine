<?php

use manuel\cine\Vista;

if ($action)
    Vista::mostrar('pelicula');
else
    Vista::mostrar('peliculas');
