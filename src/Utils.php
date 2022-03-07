<?php

namespace manuel\cine;

class Utils
{
    public const PROJECT_ROOT = 'C:\xampp\htdocs\projects\ProyectoCine';
    public const PROJECT_URL = 'http://localhost/projects/ProyectoCine/';

    public static function input(array $method, array $names): array
    {
        return array_map(fn ($name) => $method[$name] ?? '', $names);
    }
}
