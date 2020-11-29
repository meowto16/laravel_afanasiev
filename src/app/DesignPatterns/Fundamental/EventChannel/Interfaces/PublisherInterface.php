<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

interface PublisherInterface
{
    /**
     * Уведомляем подписчиков
     *
     * @param string $data Данные, которыми уведомятся подписчики
     *
     * @retux mixed
     */
    public function publish($data);
}
