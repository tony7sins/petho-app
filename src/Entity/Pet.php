<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name = "discr", type = "string")
 * @ORM\DiscriminatorMap({
 *  "pet" = "Pet",
 *  "dog" = "Dog"})
 */
class Pet
{

}