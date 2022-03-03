<?php

namespace manuel\cine;

class Utils
{
    public const PROJECT_ROOT = 'E:/Manuel/xampp/htdocs/vscode/ProyectoCine';

    public static function input(array $method, array $names): array
    {
        return array_map(fn ($name) => $method[$name] ?? '', $names);
    }
}
