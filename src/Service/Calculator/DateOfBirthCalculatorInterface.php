<?php

namespace App\Service\Calculator;

interface DateOfBirthCalculatorInterface
{

    public function calculateDateOfBirth(int $monthsAge): string;

    public function calculateAge(string $date): int;
}