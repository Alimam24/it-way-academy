<?php

namespace Core;

use Exception;

class Container
{
    protected $bindings = [];
    public function bind($key, $resolver)
    //$key: key for retrieving the service
    //$resolver: method that creates an instece and return it
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for {$key}");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);// returns an object of this class 
    }
}
//bind= regist
//resolve= retrieve and excute
