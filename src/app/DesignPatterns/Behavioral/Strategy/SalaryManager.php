<?php

namespace App\DesignPatterns\Behavioral\Strategy;

use App\DesignPatterns\Behavioral\Strategy\Interfaces\SalaryStrategyInterface;

use Illuminate\Support\Collection;

use App\Models\User;

class SalaryManager
{
    /**
     * @var SalaryStrategyInterface
     */
    private $salaryStrategy;

    /**
     * @var array
     */
    private $period;

    /**
     * @var Collection
     */
    private $users;

    /**
     * SalaryManager constructor.
     *
     * @param array $period
     * @param Collection $users
     */
    public function __construct(array $period, Collection $users)
    {
        $this->period = $period;
        $this->users = $users;
    }

    public function handle()
    {
        $usersSalary = $this->calculateSalary();

        $this->saveSalary($usersSalary);

        return $usersSalary;
    }

    /**
     * @return Collection
     */
    private function calculateSalary(): Collection
    {
        $usersSalary = $this->users->map(
            function (User $user) {
                $strategy = $this->getStrategyByUser($user);
                $salary = $this
                    ->setCalculateStrategy($strategy)
                    ->calculateUserSalary($this->period, $user);

                $strategyName = $strategy->getName();
                $userId = $user->id;

                $newItem = compact('userId', 'salary', 'strategyName');

                return $newItem;
            }
        );

        return $usersSalary;
    }

    /**
     *
     *
     *
     * @param Collection $usersSalary
     *
     *
     * @return bool
     */
    private function saveSalary(Collection $usersSalary)
    {
        return true;
    }

    /**
     * @param User $user
     *
     * @return AbstractStrategy
     * @throws \Throwable
     */
    private function getStrategyByUser(User $user): SalaryStrategyInterface
    {
        $strategyName = $user->departmentName() . 'Strategy';
        $strategyClass = __NAMESPACE__ . '\\Strategies\\'
            . ucwords($strategyName);

        throw_if(!class_exists($strategyClass), \Exception::class,
        "Класс не существует [{$strategyClass}]");

        return new $strategyClass;
    }

    /**
     * @param $period
     * @param $user
     *
     * @return int
     */
    private function calculateUserSalary($period, $user)
    {
        return $this->salaryStrategy->calc($period, $user);
    }

    /**
     * @param SalaryStrategyInterface $strategy
     *
     * @return $this
     */
    private function setCalculateStrategy(SalaryStrategyInterface $strategy)
    {
        $this->salaryStrategy = $strategy;

        return $this;
    }
}
