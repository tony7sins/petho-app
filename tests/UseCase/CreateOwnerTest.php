<?php
namespace Tests\UseCase;

use App\UseCase\CreateDog\Command\AddNewDog;
use PHPUnit\Framework\TestCase;

class CreateOwnerTest extends TestCase
{
    private $dogOne;

    public function setUp()
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

        /** @var \App\Entity\Dog $dog */
        $dog = $this->creator->create($newPet);

        $this->dogOne = $dog;
    }

    public function test_create_new_owner()
    {
        $userName = 'John Malkovich';
        $userEmail = 'john@malkovich@test';

        $userDTO = new CreateOwner(
            $userName, $userEmail, $password = null
        );

        $ownerFactory = new OwnerCreator();

        /** @var User */
        $owner = $ownerFactory
            ->create()
            ->addPet($this->dogOne)
        ;

        $this->assertInstanceOf(User::class, $owner);
    }
}
