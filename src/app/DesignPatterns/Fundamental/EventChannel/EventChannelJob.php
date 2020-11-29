<?php


namespace App\DesignPatterns\Fundamental\EventChannel;

use App\DesignPatterns\Fundamental\EventChannel\Classes\EventChannel;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Publisher;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Subscriber;

class EventChannelJob
{
    public function run()
    {
        $newsChannel = new EventChannel();

        $highgardernGroup = new Publisher('highgarden-news', $newsChannel);

        $winterfellNews = new Publisher('winterfell-news', $newsChannel);
        $winterfellDaily = new Publisher('winterfell-news', $newsChannel);

        $sansa = new Subscriber('Sansa Stark');
        $arya = new Subscriber('Arya Stark');
        $cersei = new Subscriber('Cersei Lannister');
        $snow = new Subscriber('Jon Snow');

        $newsChannel->subscribe('highgarden-news', $cersei);
        $newsChannel->subscribe('winterfell-news', $sansa);

        $newsChannel->subscribe('highgarden-news', $arya);
        $newsChannel->subscribe('winterfell-news', $arya);

        $newsChannel->subscribe('winterfell-news', $snow);

        $highgardernGroup->publish('New highgarden post');
        $winterfellNews->publish('New winterfell post');
        $winterfellDaily->publish('New alternative winterfell post');
    }
}
