<?php

namespace Tests\Service\Converter;

use App\Service\Converter\DogSexConverter;
use App\Service\Converter\PetSexConverterInterface;
use PHPUnit\Framework\TestCase;

class DogSexConverterTest extends TestCase
{
    /** @var bool */
    private $dogIsMale;
    /** @var PetSexConverterInterface */
    private $converter;

    public function setUp()
    {
        $this->converter = new DogSexConverter();
        $this->dogIsMale = true;
    }

    public function test_new_dog_sex_is_male()
    {
        $dogIsMale = $this->dogIsMale;
        $dogSex = $this->converter->convertToString($dogIsMale);

        $this->assertInternalType('string', $dogSex);
        $this->assertSame('male', $dogSex);

        $dogIsMale = $this->converter->convertToBool('male');

        $this->assertIsString($dogSex);
        $this->assertTrue($dogIsMale);
    }

    public function test_new_dog_sex_is_female()
    {
        $dogIsMale = !$this->dogIsMale;
        $dogSex = $this->converter->convertToString($dogIsMale);

        $this->assertIsString($dogSex);
        $this->assertSame('female', $dogSex);

        $dogIsMale = $this->converter->convertToBool('female');

        $this->assertIsBool($dogIsMale);
        $this->assertFalse($dogIsMale);
    }

    public function test_new_dog_wrong_string()
    {
        $this->expectException(\Exception::class);
        $dogIsMale = $this->converter->convertToBool('somemale');
    }
}
