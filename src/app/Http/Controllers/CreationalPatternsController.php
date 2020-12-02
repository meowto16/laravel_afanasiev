<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;

class CreationalPatternsController extends Controller
{
    /**
     * @var GuiFactoryInterface
     */
    private $guiKit;

    /**
     * CreationalPatternsController constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->guiKit = (new GuiKitFactory())->getFactory('SemanticUi');
    }

    /**
     *
     */
    public function AbstractFactory()
    {
//        $name = 'Абстрактная фабрика';

        $result[] = $this->guiKit->buildButton()->setColor('white')->draw();
        $result[] = $this->guiKit->buildCheckbox()->toggle()->draw();

        \Debugbar::info($result);

        return view('welcome');
    }
}
