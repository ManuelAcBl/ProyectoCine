<?php

namespace manuel\cine;

class DB
{
    protected static $pdo;

    public static function pdo(): \PDO
    {
        if (!self::$pdo) {
            $db_config = Config::get()['database'];
            self::$pdo = new \PDO("mysql:host=$db_config[ip];dbname=$db_config[name]", $db_config['user'], $db_config['password']);
        }

        return self::$pdo;
    }

    public static function run(String $sql, array $args = []): \PDOStatement
    {
        if (!$args)
            return self::pdo()->query($sql);

        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
