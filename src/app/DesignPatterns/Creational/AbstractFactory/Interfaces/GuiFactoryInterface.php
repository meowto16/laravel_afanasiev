<?php

namespace App\DesignPatterns\Creational\AbstractFactory\Interfaces;

interface GuiFactoryInterface
{
    public function buildButton(): ButtonInterface;
    public function buildCheckBox(): CheckboxInterface;
}
