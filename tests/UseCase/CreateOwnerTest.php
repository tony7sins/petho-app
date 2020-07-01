<?php
namespace Tests\UseCase;

use App\Entity\User;
use App\UseCase\Command\CreateOwner;
use App\UseCase\Factory\OwnerCreator;
use App\Utils\UuidGenerator;
use PHPUnit\Framework\TestCase;

class CreateOwnerTest extends TestCase
{

    public function test_create_new_owner()
    {
        $userName = 'John Malkovich';
        $userEmail = 'john@malkovich@test';

        $userDto = new CreateOwner(
            $userName, $userEmail, $password = ''
        );

        $ownerFactory = new OwnerCreator(UuidGenerator::next());

        /** @var User */
        $owner = $ownerFactory->create($userDto);

        $this->assertInstanceOf(User::class, $owner);
        $this->assertSame($userName, $owner->getName());
        $this->assertSame($userEmail, $owner->getEmail());
    }
}
