<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;

class FundamentalPatternsController extends Controller
{
    /**
     * Контейнер свойств (англ. property container)
     *
     * @url http://127.0.0.1:8000/fundamentals/property-container
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
}
