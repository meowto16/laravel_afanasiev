<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes\SemanticUi;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;

class ButtonSemanticUi implements ButtonInterface
{
    protected $color;

    public function __construct()
    {
        $this->color = 'No color';
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
        return "Button Semantic UI, color: {$this->getColor()}";
    }
}
