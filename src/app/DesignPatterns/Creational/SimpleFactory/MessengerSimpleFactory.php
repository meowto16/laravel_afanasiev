<?php


namespace App\DesignPatterns\Creational\SimpleFactory;


use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessenger;
use App\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;

class MessengerSimpleFactory implements MessengerSimpleFactoryInterface
{

    public function build(string $type): MessengerInterface
    {
        switch ($type) {
            case 'email':
                $messenger = new EmailMessenger();
                $messenger
                    ->setSender('admin@site.local')
                    ->setMessage('Default EMAIL message');
                break;
            case 'sms':
                $messenger = new SmsMessenger();
                $messenger
                    ->setSender('88002000500')
                    ->setMessage('Default PHONE message');
                break;
            default:
                throw new \Exception('Не верный тип объекта');
        }

        return $messenger;
    }
}
