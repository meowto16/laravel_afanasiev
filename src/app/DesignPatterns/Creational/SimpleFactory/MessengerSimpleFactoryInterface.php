<?php


namespace App\DesignPatterns\Creational\SimpleFactory;


use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;

interface MessengerSimpleFactoryInterface
{
    /**
     * @param string $type
     * @return MessengerInterface
     */
    public function build(string $type): MessengerInterface;
}
