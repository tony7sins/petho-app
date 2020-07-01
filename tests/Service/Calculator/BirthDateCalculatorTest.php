<?php

namespace Tests\Service\Calculator;

use App\Service\Calculator\BirthDateCalculator;
use PHPUnit\Framework\TestCase;

class BirthDateCalculatorTest extends TestCase
{
    private $calc;

    public function setUp()
    {
        $this->calc = new BirthDateCalculator();
    }

    public function test_age_calculation()
    {
        $diff = 13;

        $age = $this->calc->calculateBirthDate($diff);

        $date = (new \DateTime("{$diff} months ago"))->format('Y-m');
        $this->assertSame($date, $age);
    }

    public function test_date_calculation()
    {

        $diff = 18;

        $date = (new \DateTime("{$diff} months ago"))->format('Y-m');

        $date = $this->calc->calculateAge($date);

        $this->assertSame($diff, $date);
    }
}
