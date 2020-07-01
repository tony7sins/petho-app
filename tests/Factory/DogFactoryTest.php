<?php

namespace Tests\Entity;

use App\Entity\Dog;
use App\Service\Calculator\DateOfBirthCalculator;
use App\Service\Calculator\PetSizeCalculator;
use App\Service\Converter\DogSexConverter;
use App\Structures\PetSize;
use App\UseCase\CreateDog\Command\AddNewDog;
use App\UseCase\CreateDog\Factory\DogCreator;
use PHPUnit\Framework\TestCase;

class DogFactoryTest extends TestCase
{
    private $creator;

    public function setUp()
    {
        $sizes = new PetSize();
        $dogWasBirth = new DateOfBirthCalculator();

        $sizeCalc = new PetSizeCalculator();
        $converter = new DogSexConverter();

        $this->creator = new DogCreator($sizes, $dogWasBirth, $sizeCalc, $converter);
    }

    public function test_add_new_dog()
    {

        $name = 'Trump';
        $height = 560;
        $weight = 20000;
        $age = 13;

        $isActive = true;
        $isMale = true;
        $isStelized = true;
        $isCaptived = false;

        $newPet = new AddNewDog(
            $isActive,
            $isMale,
            $isStelized,
            $isCaptived,
            $height,
            $weight,
            $age,
            $name
        );

        /** @var Dog $dog */
        $dog = $this->creator->create($newPet);

        $this->assertInstanceOf(Dog::class, $dog);

        $size = 'middle';
        $dateOfBirth = (new \DateTime('13 months ago'))->format('Y-m');
        $dogSex = 'male';

        $this->assertSame($size, $dog->getSize());
        $this->assertSame($dateOfBirth, $dog->getBirthMonth());
        $this->assertSame($dogSex, $dog->getSex());
    }

    public function test_add_new_bitch()
    {

        $name = 'Dazy';
        $height = 560;
        $weight = 20000;
        $age = 20;

        $isActive = true;
        $isMale = false;
        $isStelized = true;
        $isCaptived = false;

        $newPet = new AddNewDog(
            $isActive,
            $isMale,
            $isStelized,
            $isCaptived,
            $height,
            $weight,
            $age,
            $name
        );

        /** @var Dog $dog */
        $dog = $this->creator->create($newPet);

        $this->assertInstanceOf(Dog::class, $dog);

        $size = 'middle';
        $dateOfBirth = (new \DateTime('20 months ago'))->format('Y-m');
        $dogSex = 'female';

        $this->assertSame($size, $dog->getSize());
        $this->assertSame($dateOfBirth, $dog->getBirthMonth());
        $this->assertSame($dogSex, $dog->getSex());
    }
}
