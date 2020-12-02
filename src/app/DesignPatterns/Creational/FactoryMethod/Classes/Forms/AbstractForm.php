<?php

namespace App\DesignPatterns\Creational\FactoryMethod\Classes\Forms;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\DesignPatterns\Creational\FactoryMethod\Interfaces\FormInterface;


/**
 * Class AbstractForm
 *
 * @package App\DesignPatterns\Creational\FactoryMethod\Classes\Forms
 */
abstract class AbstractForm implements FormInterface
{
    /**
     * Рисуем форму
     */
    public function render()
    {
        $guiKit = $this->createGuiKit();
        $result[] = $guiKit->buildCheckBox()->draw();
        $result[] = $guiKit->buildButton()->draw();

        return $result;
    }

    /**
     * Получаем инструментарий для рисования объектов формы
     *
     * @retrun GuiFactoryInterface
     */
    abstract function createGuiKit(): GuiFactoryInterface;
}
