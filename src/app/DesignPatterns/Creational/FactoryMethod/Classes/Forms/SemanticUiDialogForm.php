<?php


namespace App\DesignPatterns\Creational\FactoryMethod\Classes\Forms;


use App\DesignPatterns\Creational\AbstractFactory\Factories\SemanticUiFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class SemanticUiDialogForm extends AbstractForm
{
    function createGuiKit(): GuiFactoryInterface
    {
        return new SemanticUiFactory();
    }
}
