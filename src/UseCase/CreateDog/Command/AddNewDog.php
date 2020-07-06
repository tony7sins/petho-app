<?php

namespace App\UseCase\CreateDog\Command;

class AddNewDog
{
    // private $animalFamily = 'dog';
    private $name = 'Dazy';
    private $height = 560;
    private $weight = 20000;
    private $age = 13;

    private $isActive = true;
    private $isMale = true;
    private $isStelized = true;
    private $isCaptived = false;

    public function __construct(array $dogData)
    {

        // $this->animalFamily = $dogData['$animalFamily'];
        $this->isActive = $dogData['isActive'];
        $this->isMale = $dogData['isMale'];
        $this->isStelized = $dogData['isSterilized'];
        $this->isCaptived = $dogData['isCaptived'];
        $this->height = $dogData['height'];
        $this->weight = $dogData['weight'];
        $this->age = $dogData['age'];
        $this->name = $dogData['name'];

    }

    // public function getAnimalFamily(): string
    // {
    //     return $this->animalFamily;
    // }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getIsMale(): bool
    {
        return $this->isMale;
    }

    public function getIsStelized(): bool
    {
        return $this->isStelized;
    }

    public function getIsCaptived(): bool
    {
        return $this->isCaptived;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getAge(): int
    {
        return $this->age;
    }

}