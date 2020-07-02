<?php

namespace App\UseCase\CreateDog\Factory;

use App\Entity\Dog;
use App\Entity\Pet;
use App\Factory\PetCreator;
use App\Service\Calculator\DateOfBirthCalculatorInterface;
use App\Service\Calculator\PetSizeCalculatorInterface;
use App\Service\Converter\DogSexConverter;
use App\Service\Converter\PetSexConverterInterface;
use App\Structures\PetSize;
use App\UseCase\CreateDog\Command\AddNewDog;

class DogCreator extends PetCreator
{
    private $sizes;

    private $dateOfBirthCalc;
    private $petSizeCalc;
    /** @var DogSexConverter */
    private $sexConverter;

    /** @var Dog */
    private $entity;

    public function __construct(
        PetSize $sizes,
        DateOfBirthCalculatorInterface $dateOfBirthCalculator,
        PetSizeCalculatorInterface $petSizeCalc,
        PetSexConverterInterface $sexConverter
    ) {
        $this->sizes = $sizes::DOG;
        $this->dateOfBirthCalc = $dateOfBirthCalculator;
        $this->petSizeCalc = $petSizeCalc;
        $this->sexConverter = $sexConverter;
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
            ->setBirthMonth($this->dateOfBirthCalc->calculateDateOfBirth($dog->getAge()))
            ->setSize($this->petSizeCalc->calculateSize($this->sizes, $dog->getHeight(), $dog->getWeight()))
            ->setSex($this->sexConverter->convertToString($dog->getIsMale()))
        ;

        $this->entity = $entity;
    }

    public function addOwner($owner): void
    {
        // TODO make owner method
    }
}
