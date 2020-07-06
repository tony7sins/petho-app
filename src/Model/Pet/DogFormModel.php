<?php

namespace App\Model\Pet;

// use Symfony\Component\Validator\Constraints as Assert;

class DogFormModel extends PetFormModel
{
    // private $animalFamily = 'dog';
    /** @var string */
    public $name;
    /** @var integer */
    public $height;
    /** @var integer */
    public $weight;
    /** @var integer */
    public $age;
    /** @var boolean */
    public $isActive;
    /** @var boolean */
    public $isMale;
    /** @var boolean */
    public $isSterilized;
    /** @var boolean */
    public $isCaptived;

}