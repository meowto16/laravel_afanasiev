<?php

namespace App\DesignPatterns\Creational\Singleton;

trait SingletonTrait
{
    private static $instance = null;

    /**
     * Запрещаем прямое создание
     *
     * SingletonTrait constructor.
     */
    private function __construct()
    {
        //
    }

    /**
     * Запрещаем клонирование
     */
    private function __clone()
    {
        //
    }

    /**
     * Запрещаем десериализацию
     */
    private function __wake()
    {
        //
    }

    /**
     * @return SingletonTrain|null
     */
    public static function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());
    }
}
