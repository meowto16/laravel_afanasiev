<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Classes\Forms;

use App\DesignPatterns\Creational\AbstractFactory\Factories\BootstrapFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapDialogForm extends AbstractForm
{
    /**
     * @return GuiFactoryInterface
     */
    public function createGuiKit(): GuiFactoryInterface
    {
        return new BootstrapFactory();
    }
}
