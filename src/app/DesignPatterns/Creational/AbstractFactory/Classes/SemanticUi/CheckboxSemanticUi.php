<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes\SemanticUi;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckboxInterface;

class CheckboxSemanticUi implements CheckboxInterface
{
    public $checked;

    public function __construct()
    {
        $this->checked = false;
    }

    public function toggle(): CheckboxInterface
    {
        $this->checked = !$this->checked;

        return $this;
    }

    public function draw(): string
    {
        return "Semantic UI Checkbox, value: {$this->checked}";
    }
}
