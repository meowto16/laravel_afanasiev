<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

use App\DesignPatterns\Creational\AbstractFactory\Factories\BootstrapFactory;
use App\DesignPatterns\Creational\AbstractFactory\Factories\SemanticUiFactory;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class GuiKitFactory
{
    /**
     * @param string $type
     *
     * @return GuiFactoryInterface
     * @throws \Exception
     */
    public function getFactory(string $type): GuiFactoryInterface
    {
        switch ($type) {
            case 'Bootstrap':
                $factory = new BootstrapFactory();
                break;
            case 'SemanticUi':
                $factory = new SemanticUiFactory();
                break;
            default:
                throw new \Exception("Неизвестный тип фабрики [{$type}]");
        }

        return $factory;
    }
}
