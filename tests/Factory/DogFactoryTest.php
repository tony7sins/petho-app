<?php

namespace Tests\Factory;

use App\Entity\Dog;
use App\Factory\Pet\DogCreator;
use App\Model\Pet\DogFormModel;
use App\Service\Calculator\DateOfBirthCalculator;
use App\Service\Calculator\PetSizeCalculator;
use App\Service\Converter\DogSexConverter;
use App\Structures\PetSize;
use PHPUnit\Framework\TestCase;

class DogFactoryTest extends TestCase
{
    /** @var DogCreator */
    private $creator;

    public function setUp()
    {
        $sizes = new PetSize();
        $dogWasBirth = new DateOfBirthCalculator();

        $sizeCalc = new PetSizeCalculator();
        $converter = new DogSexConverter();

        $this->creator = new DogCreator($sizes, $dogWasBirth, $sizeCalc, $converter);
    }

    public function test_add_new_dog()
    {

        /** @var DogFormModel $petModel */
        $petModel = new DogFormModel();

        $petModel->name = 'Trump';
        $petModel->height = 560;
        $petModel->weight = 20000;
        $petModel->age = 13;

        $petModel->isActive = true;
        $petModel->isMale = true;
        $petModel->isSterilized = true;
        $petModel->isCaptived = false;

        /** @var Dog $dog */
        $dog = $this->creator->create($petModel);

        $this->assertInstanceOf(Dog::class, $dog);

        $size = 'middle';
        $dateOfBirth = (new \DateTime('13 months ago'))->format('Y-m');
        $dogSex = 'male';

        $this->assertSame($size, $dog->getSize());
        $this->assertSame($dateOfBirth, $dog->getBirthMonth());
        $this->assertSame($dogSex, $dog->getSex());
    }

    public function test_add_new_bitch()
    {

        $petModel = new DogFormModel();

        $petModel->name = 'Dazy';
        $petModel->height = 560;
        $petModel->weight = 20000;
        $petModel->age = 20;
        $petModel->isActive = true;
        $petModel->isMale = false;
        $petModel->isSterilized = true;
        $petModel->isCaptived = false;

        /** @var Dog $dog */
        $dog = $this->creator->create($petModel);

        $this->assertInstanceOf(Dog::class, $dog);

        $size = 'middle';
        $dateOfBirth = (new \DateTime('20 months ago'))->format('Y-m');
        $dogSex = 'female';

        $this->assertSame($size, $dog->getSize());
        $this->assertSame($dateOfBirth, $dog->getBirthMonth());
        $this->assertSame($dogSex, $dog->getSex());
    }
}
