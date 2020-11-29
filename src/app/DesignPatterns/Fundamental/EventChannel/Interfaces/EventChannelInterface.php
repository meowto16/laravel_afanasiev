<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

/**
 * Interface EventChannelInterface
 *
 * @package App\DesignPatterns\Fundamental\EventChannel\Interfaces
 *
 * Интерфейс канала событий
 * Связующее звено между подписчиками и издателями.
 */
interface EventChannelInterface
{
    /**
     * Издатель уведомляет канал о том что надо
     * всех кто подписан на тему $topic уведомить данными $data
     *
     * @param string $topic
     * @param $data
     *
     * @return mixed
     */
    public function publish($topic, $data);

    /**
     * Подписчик $subscriber подписывается на событие (данные, инфу и тп) $topic
     *
     * @param string $topic
     * @param SubscriberInterface $subscriber
     *
     * @return mixed
     */
    public function subscribe($topic, SubscriberInterface $subscriber);
}
