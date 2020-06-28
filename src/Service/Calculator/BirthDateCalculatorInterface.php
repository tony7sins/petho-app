<?php

namespace App\Service\Calculator;

interface BirthDateCalculatorInterface
{

    public function calculateBirthDate(int $monthsAge): string;

    public function calculateAge(string $date): int;

    /** @todo make it private */
    public function setCurrentDate(string $time = 'now'): void;
}