<?php
namespace Tests\Factory;

use App\Entity\User;
use App\Factory\User\OwnerCreator;
use App\Model\User\OwnerFormModel;
use App\Utils\UuidGenerator;
use PHPUnit\Framework\TestCase;

class CreateOwnerTest extends TestCase
{

    public function test_create_new_owner()
    {

        $userName = 'John Malkovich';
        $userEmail = 'john@malkovich@test';

        $userModel = new OwnerFormModel;
        $userModel->name = $userName;
        $userModel->email = $userEmail;

        $ownerFactory = new OwnerCreator(UuidGenerator::next());

        /** @var User */
        $owner = $ownerFactory->create($userModel);

        $this->assertInstanceOf(User::class, $owner);
        $this->assertSame($userName, $owner->getName());
        $this->assertSame($userEmail, $owner->getEmail());
    }
}
