<?php

namespace Core;

class App
{
    protected static $container;

//all methodes are static for a global access
    //setter
    public static function setContainer($container)
    {
        static::$container = $container;
    }
    //getter
    public static function container()
    {
        return static::$container;
    }

    //for acceseing container function throw app class
    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
