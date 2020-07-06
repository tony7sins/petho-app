<?php

namespace App\UseCase\CreateDog\Factory;

use App\Entity\Dog;
use App\Entity\Pet;
use App\Factory\PetCreator;
use App\Model\Pet\DogFormModel;
use App\Model\Pet\PetFormModelInterface;
use App\Service\Calculator\DateOfBirthCalculatorInterface;
use App\Service\Calculator\PetSizeCalculatorInterface;
use App\Service\Converter\DogSexConverter;
use App\Service\Converter\PetSexConverterInterface;
use App\Structures\PetSize;

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
        DateOfBirthCalculatorInterface $dateOfBirthCalc,
        PetSizeCalculatorInterface $petSizeCalc,
        PetSexConverterInterface $sexConverter
    ) {
        $this->sizes = $sizes::DOG;
        $this->dateOfBirthCalc = $dateOfBirthCalc;
        $this->petSizeCalc = $petSizeCalc;
        $this->sexConverter = $sexConverter;
    }

    public function create(PetFormModelInterface $dog): Pet
    {
        // TODO Make LogicExeption!
        $this->init($dog);
        return $this->entity;
    }

    private function init(DogFormModel $dog)
    {
        $entity = new Dog();
        $entity
            ->setName($dog->name)
            ->setBirthMonth($this->dateOfBirthCalc->calculateDateOfBirth($dog->age))
            ->setSize($this->petSizeCalc->calculateSize($this->sizes, $dog->height, $dog->weight))
            ->setSex($this->sexConverter->convertToString($dog->isMale))
        ;

        $this->entity = $entity;
    }

    public function addOwner($owner): void
    {
        // TODO make owner method
    }
}
