<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

/**
 * Interface SubscriberInterface
 *
 * @package App\DesignPatterns\Fundamental\EventChannel\Interfaces
 */
interface SubscriberInterface
{
    /**
     * Уведомление подписчика
     *
     * @param $data
     *
     * @return mixed
     */
    public function notify($data);
}
