<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\EventChannel\EventChannelJob;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;

class FundamentalPatternsController extends Controller
{
    /**
     * Демонстрация шаблона проектирования "Контейнер свойств (англ. property container)
     *
     * @url http://localhost:8100/fundamentals/property-container
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function PropertyContainer()
    {
        $name = 'Контейнер свойств';
//        $description = PropertyContainer::getDescription();

        $item = new BlogPost();

        $item->setTitle('Заголовок статьи');
        $item->setCategory(10);

        $item->addProperty('view_count', 100);

        $item->addProperty('last_update', '2030-02-01');
        $item->setProperty('last_update', '2030-02-02');

        $item->addProperty('read_only', true);
        $item->deleteProperty('read_only');

        dd(compact('name', 'item'));
    }

    /**
     * Демонстрация шаблона проектирования - "Делегирование"
     *
     * @url http://localhost:8100/fundamentals/delegation
     *
     */
    public function Delegation()
    {
        $name = 'Делегирование (Delegation)';

        $appMessenger = new AppMessenger();

        $appMessenger->setSender('sender@email.net')
            ->setRecipient('recipient@email.net')
            ->setMessage('Hello email messenger!')
            ->send();

        $appMessenger->toSms()
            ->setSender('11111111')
            ->setRecipient('2222222222')
            ->setMessage('Hello SMS messenger!')
            ->send();

        \DebugBar::info($appMessenger);

        return view('welcome');
    }

    /**
     * Демонстрация шаблона проектирования - "Канал событий (Event Channel)"
     *
     * @url http://localhost:8100/fundamentals/event-channel
     */
    public function EventChannel()
    {
        $name = 'Канал событий (event channel)';

        $item = new EventChannelJob();
        $item->run();

        return view('welcome');
    }
}
