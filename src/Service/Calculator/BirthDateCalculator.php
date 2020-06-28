<?php

namespace App\Service\Calculator;

class BirthDateCalculator implements BirthDateCalculatorInterface
{
    /** @var \DateTime */
    private $currentDate;

    public function __construct()
    {
        $this->currentTime = $this->setCurrentDate();
    }

    public function calculateBirthDate(int $monthsAge): string
    {
        $date = new \DateTime("-{$monthsAge} months");

        return $date->format('Y-m');
    }

    public function calculateAge(string $date): int
    {
        $pastDate = new \DateTime($date);
        $dateDiff = $this->currentDate->diff($pastDate);
        $different = (($dateDiff->y) * 12 + ($dateDiff->m));
        return $different;
    }

    public function setCurrentDate(string $time = 'now'): void
    {
        $this->currentDate = new \DateTime($time);
    }
}