<?php

namespace App\DesignPatterns\Creational\Singleton;


class AdvancedSingleton
{
    use SingletonTrait;

    private $test;

    /**
     * @param $val
     */
    public function setTest($val)
    {
        $this->test = $val;
    }
}
