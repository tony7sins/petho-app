<?php

namespace Tests\Service\Calculator;

use App\Service\Calculator\PetSizeCalculator;
use App\Structures\PetSize;
use PHPUnit\Framework\TestCase;

class PetSizeCalculatorTest extends TestCase
{
    private $sizes;
    private $culc;

    public function setUp()
    {
        $this->sizes = PetSize::DOG;
        $this->culc = new PetSizeCalculator();
    }

    public function test_pet_size_culc()
    {

        $size = $this->culc->calculateSize($this->sizes, 300, 5000);
        $this->assertSame('tiny', $size);
        $size = $this->culc->calculateSize($this->sizes, 290, 5000);
        $this->assertSame('tiny', $size);

        $size = $this->culc->calculateSize($this->sizes, 400, 10000);
        $this->assertSame('small', $size);
        $size = $this->culc->calculateSize($this->sizes, 390, 5000);
        $this->assertSame('small', $size);

        $size = $this->culc->calculateSize($this->sizes, 400, 11000);
        $this->assertSame('middle', $size);
        $size = $this->culc->calculateSize($this->sizes, 560, 19000);
        $this->assertSame('middle', $size);

        $size = $this->culc->calculateSize($this->sizes, 560, 21000);
        $this->assertSame('big', $size);
        $size = $this->culc->calculateSize($this->sizes, 600, 30000);
        $this->assertSame('big', $size);

        $size = $this->culc->calculateSize($this->sizes, 600, 50000);
        $this->assertSame('huge', $size);
        $size = $this->culc->calculateSize($this->sizes, 200, 100000);
        $this->assertSame('huge', $size);
        $size = $this->culc->calculateSize($this->sizes, 700, 3000);
        $this->assertSame('huge', $size);
    }

    public function test_pet_size_culc_exception()
    {

        $this->expectException(\InvalidArgumentException::class);
        $this->culc->calculateSize($this->sizes, -1, 3000);
    }
}
