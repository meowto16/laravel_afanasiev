<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\BootstrapDialogForm;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\SemanticUiDialogForm;
use App\DesignPatterns\Creational\SimpleFactory\MessengerSimpleFactory;

use App\DesignPatterns\Creational\StaticFactory\StaticFactory;

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

    public function FactoryMethod()
    {
//        $name = 'Фабричный метод';

//        $dialogForm = new BootstrapDialogForm();
        $dialogForm = new SemanticUiDialogForm();
        $result = $dialogForm->render();

        \Debugbar::info($result);

        return view('welcome');
    }

    public function StaticFactory()
    {
//        $name = 'Статическая фабрика';

        $appMailMessenger = StaticFactory::build('email');
        $appPhoneMessenger = StaticFactory::build('sms');

        \Debugbar::info($appMailMessenger, $appPhoneMessenger);

        return view('welcome');
    }

    public function SimpleFactory()
    {
//        $name = 'Простая фабрика';

        $factory = new MessengerSimpleFactory();

        $appMailMessenger = $factory->build('email');
        $appPhoneMessenger = $factory->build('sms');

        \Debugbar::info($appMailMessenger, $appPhoneMessenger);

        return view('welcome');
    }
}
