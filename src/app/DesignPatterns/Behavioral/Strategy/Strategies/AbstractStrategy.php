<?php


namespace App\DesignPatterns\Behavioral\Strategy\Strategies;


use App\DesignPatterns\Behavioral\Strategy\Interfaces\SalaryStrategyInterface;
use App\Models\User;

abstract class AbstractStrategy implements SalaryStrategyInterface
{

    public function calc(array $period, User $user): int
    {
        return rand(500, 2000);
    }

    public function getName(): string
    {
        return class_basename(static::class);
    }
}
