<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class DogSexConverterTest extends TestCase
{
    /** @var bool */
    private $dogIsMale;

    public function setUp()
    {
        $this->dogIsMale = true;
    }

    public function test_new_dog_sex_is_male()
    {
        $dogIsMale = $this->dogIsMale;

        $converter = new DogSexConverter();

        $dogSex = $converter->convertToString($dogIsMale);

        $this->assertInternalType('string', $dogSex);
        $this->assertSame('male', $dogSex);

        $dogIsMale = $converter->convertToBool('male');

        $this->assertIsString($dogSex);
        $this->assertTrue($dogIsMale);
    }

    public function test_new_dog_sex_is_female()
    {
        $dogIsMale = !$this->dogIsMale;

        $converter = new DogSexConverter();

        $dogSex = $converter->convertToString($dogIsMale);

        $this->assertIsString($dogSex);
        $this->assertSame('female', $dogSex);

        $dogIsMale = $converter->convertToBool('female');

        $this->assertIsBool($dogIsMale);
        $this->assertFalse($dogIsMale);
    }
}