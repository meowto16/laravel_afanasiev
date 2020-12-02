<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes\Bootstrap;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;

class ButtonBootstrap implements ButtonInterface
{
    protected $color;

    public function __construct()
    {
        $this->color = 'No Color';
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor(string $color): ButtonInterface
    {
        $this->color = $color;

        return $this;
    }

    public function draw(): string
    {
        return "Button Bootstrap, color: {$this->getColor()}";
    }
}
