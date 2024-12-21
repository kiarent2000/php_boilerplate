<?php

namespace App;

class Config
{
    private static $config = [];

    public static function load($file)
    {
        if (empty(self::$config)) {
            self::$config = require __DIR__ . '/../config/' . $file;
        }
    }

    public static function get($key)
    {
        return self::$config[$key] ?? null;
    }
}
