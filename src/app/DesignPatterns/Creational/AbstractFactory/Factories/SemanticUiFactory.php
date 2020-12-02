<?php

namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Classes\SemanticUi\ButtonSemanticUi;
use App\DesignPatterns\Creational\AbstractFactory\Classes\SemanticUi\CheckboxSemanticUi;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckboxInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class SemanticUiFactory implements GuiFactoryInterface
{
    /**
     * @return ButtonInterface
     */
    public function buildButton(): ButtonInterface
    {
        return new ButtonSemanticUi();
    }

    /**
     * @return CheckBoxInterface
     */
    public function buildCheckbox(): CheckboxInterface
    {
        return new CheckboxSemanticUi();
    }
}
