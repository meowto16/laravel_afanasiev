<?php

namespace App\DesignPatterns\Creational\Singleton;

class SimpleSingleton
{
    /**
     * @var SimpleSingleton
     */
    private static $instance;

    private $test;

    /**
     * @return SimpleSingleton
     */
    static public function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());
    }

    /**
     * @param $val
     */
    public function setTest($val)
    {
        $this->test = $val;
    }
}
