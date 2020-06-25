<?php

namespace Tests;

use App\Service\BirthDateCalculator;
use PHPUnit\Framework\TestCase;

class BirthDateCalculatorTest extends TestCase
{
    private $calc;

    public function setUp()
    {
        $this->calc = new BirthDateCalculator();
        $this->calc->setCurrentDate('2020-06');
    }

    public function test_age_calculation()
    {

        $age = $this->calc->calculateBirthDate(13);

        $this->assertSame('2019-05', $age);
    }

    public function test_date_calculation()
    {

        $date = $this->calc->calculateAge('2019-01');

        $this->assertSame(17, $date);
    }
}
