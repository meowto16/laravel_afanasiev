<?php

namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Classes\Bootstrap\ButtonBootstrap;
use App\DesignPatterns\Creational\AbstractFactory\Classes\Bootstrap\CheckBoxBootstrap;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckboxInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapFactory implements GuiFactoryInterface
{
    /**
     * @return ButtonInterface
     */
    public function buildButton(): ButtonInterface
    {
        return new ButtonBootstrap();
    }

    /**
     * @return CheckBoxInterface
     */
    public function buildCheckbox(): CheckboxInterface
    {
        return new CheckBoxBootstrap();
    }
}
