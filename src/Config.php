<?php

namespace manuel\cine;

class Config
{
    private const CONFIG_FILE = '/config/config.ini';

    private static array $ini_file = [];

    public static function get(): array
    {
        return self::file();
    }

    public static function getAll(array $keys, String $seccion): array
    {
        return array_map(fn ($key) => self::get($key, $seccion), $keys);
    }

    public static function get2(String $key, String $seccion): String
    {
        return self::file()[$seccion][$key];
    }

    private static function file()
    {
        if (!self::$ini_file)
            self::$ini_file = parse_ini_file(dirname(__DIR__) . self::CONFIG_FILE, true);

        return self::$ini_file;
    }
}
