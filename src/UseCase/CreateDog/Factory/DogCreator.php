<?php

namespace App\UseCase\CreateDog\Factory;

use App\Entity\Dog;
use App\Entity\Pet;
use App\Factory\PetCreator;
use App\Service\Calculator\BirthDateCalculator;
use App\Service\Calculator\PetSizeCalculator;
use App\Structures\PetSize;
use App\UseCase\CreateDog\Command\AddNewDog;

class DogCreator extends PetCreator
{
    private $sizes;

    private $birthDateCalc;
    private $petSizeCalc;

    /** @var Dog */
    private $entity;

    /** @todo Set interfaces. not direct class injection */
    public function __construct(
        PetSize $sizes,
        BirthDateCalculator $birthDateCalculator,
        PetSizeCalculator $petSizeCalc
    ) {
        $this->sizes = $sizes::DOG;
        $this->birthDateCalc = $birthDateCalculator;
        $this->petSizeCalc = $petSizeCalc;

    }

    public function create($dog): Pet
    {
        $this->init($dog);
        return $this->entity;
    }

    private function init(AddNewDog $dog)
    {
        $entity = new Dog();
        $entity
            ->setName($dog->getName())
            ->setBirthMonth($this->birthDateCalc->calculateBirthDate($dog->getAge()))
            ->setSize($this->petSizeCalc->calculateSize($this->sizes, $dog->getHeight(), $dog->getWeight()))
            ->setSex($dog->getIsFemale())
        ;

        $this->entity = $entity;
    }

    public function addOwner($owner): void
    {
        // TODO make owner method
    }
}
