<?php

namespace Tests\Entity;

use App\UseCase\Dog\Factory\DogFactory;
use PHPUnit\Framework\TestCase;

class DogFactoryTest extends TestCase
{
    public function test_add_new_dog()
    {

        $animalFamily = 'dog';
        $isActive = true;
        $isFemale = true;
        $isStelized = true;
        $isCaptived = false;
        $name = 'Dazy';
        $height = 560;
        $weight = 20000;
        $age = 13;

        $newPet = new CreateDog(
            $animalFamily,
            $isActive,
            $isFemale,
            $isStelized,
            $isCaptived,
            $height,
            $weight,
            $age,
            $name
        );

        $dog = new DogFactory($newPet);

        $this->assertInstanceOf(Dog::class, $dog);
        $this->assertInstanceOf(Animal::class, $dog);

        $size = 'huge';
        $birthMonth = '2019-05';

        $this->assertSame($newPet, $dog->getSize());
        $this->assertSame($birthMonth, $dog->getBirthMonth());
    }
}
