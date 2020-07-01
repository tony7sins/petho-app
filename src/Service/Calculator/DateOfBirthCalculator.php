<?php

namespace App\Service\Calculator;

class DateOfBirthCalculator implements DateOfBirthCalculatorInterface
{
    /** @var \DateTime */
    private $currentDate;

    public function __construct()
    {
        $this->currentTime = $this->setCurrentDate();
    }

    public function calculateDateOfBirth(int $monthsAge): string
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

    private function setCurrentDate(): void
    {
        $this->currentDate = new \DateTime('now');
    }
}