<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Interfaces;


interface ButtonInterface
{
    public function getColor();
    public function setColor(string $color): ButtonInterface;
    public function draw(): string;
}
