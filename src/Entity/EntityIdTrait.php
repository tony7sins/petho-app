<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait EntityIdTrait
{
    /**
     * The unique auto incremented primary key.
     *
     * @var int|null
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * The internal primary identity key.
     *
     * @var Uuid
     * @ORM\CustomIdGenegator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(type="uuid", unique=true)
     */
    protected $uuid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setUuid(string $uuidString)
    {
        $this->uuidString = Uuid::fromString($uuidString);

        return $this;
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

}
