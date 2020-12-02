<?php

namespace App\DesignPatterns\Creational\AbstractFactory\Classes\Bootstrap;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckboxInterface;

class CheckBoxBootstrap implements CheckboxInterface
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
        return "Bootstrap Checkbox, value: {$this->checked}";
    }
}
