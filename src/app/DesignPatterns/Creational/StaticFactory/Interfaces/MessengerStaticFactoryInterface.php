<?php


namespace App\DesignPatterns\Creational\StaticFactory\Interfaces;


use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;

interface MessengerStaticFactoryInterface
{
    public static function build(string $type): MessengerInterface;
}
