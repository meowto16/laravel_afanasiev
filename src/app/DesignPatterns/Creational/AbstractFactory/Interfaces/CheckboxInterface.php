<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Interfaces;


interface CheckboxInterface
{
    public function toggle(): CheckboxInterface;

    public function draw(): string;
}
