<?php


namespace App\DesignPatterns\Creational\StaticFactory;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;

use App\DesignPatterns\Creational\StaticFactory\Interfaces\MessengerStaticFactoryInterface;

class StaticFactory implements MessengerStaticFactoryInterface
{
    /**
     * @param string $type
     *
     * @return MessengerInterface
     * @throws \Exception
     */
    public static function build(string $type = 'email'): MessengerInterface
    {
        $messenger = new AppMessenger();

        switch ($type) {
            case 'email':
                $messenger->toEmail();
                $sender = 'admin@site.local';
                break;

            case 'sms':
                $messenger->toSms();
                $sender = '88002000500';
                break;

            default:
                throw new \Exception("Неизвестный тип [{$type}]");
        }

        $messenger
            ->setSender($sender)
            ->setMessage('default message');

        return $messenger;
    }
}
