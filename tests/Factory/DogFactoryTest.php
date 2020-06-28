<?php

namespace Tests\Entity;

use App\Entity\Dog;
use App\Service\BirthDateCalculator;
use App\Service\PetSizeCalculator;
use App\Structures\PetSize;
use App\UseCase\CreateDog\Command\AddNewDog;
use App\UseCase\CreateDog\Factory\DogCreator;
use PHPUnit\Framework\TestCase;

class DogFactoryTest extends TestCase
{

    public function test_add_new_dog()
    {

        $name = 'Dazy';
        $height = 560;
        $weight = 20000;
        $age = 13;

        $isActive = true;
        $isFemale = true;
        $isStelized = true;
        $isCaptived = false;

        $newPet = new AddNewDog(
            $isActive,
            $isFemale,
            $isStelized,
            $isCaptived,
            $height,
            $weight,
            $age,
            $name
        );

        $sizes = new PetSize();
        $bDcalc = new BirthDateCalculator();
        $sizeCalc = new PetSizeCalculator();

        $creator = new DogCreator($sizes, $bDcalc, $sizeCalc);

        $dog = $creator->create($newPet);

        $this->assertInstanceOf(Dog::class, $dog);

        $size = 'middle';
        $birthMonth = '2019-05';

        $this->assertSame($size, $dog->getSize());
        $this->assertSame($birthMonth, $dog->getBirthMonth());
    }
}
