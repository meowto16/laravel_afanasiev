<?php


namespace App\DesignPatterns\Creational\Singleton;


use App\DesignPatterns\Creational\Singleton\Contracts\AnotherConnection;

class LaravelSingleton implements AnotherConnection
{
    private $test;

    /**
     * @param $val
     */
    public function setTest($val)
    {
        $this->test = $val;
    }
}
