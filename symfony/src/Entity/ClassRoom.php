<?php

namespace App\Entity;

use App\Entity\Traits\CreateDateTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClassRoom
 *
 * @ORM\Entity
 * @ORM\Table(name="classroom")
 * @ORM\HasLifecycleCallbacks()
 */
class ClassRoom
{
    use CreateDateTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     * @Assert\Type(type="string")
     * @Assert\Length(max="30")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Choice(choices="{0,1}")
     */
    private $active;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ClassRoom
     */
    public function setName(string $name): ClassRoom
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getActive(): int
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return ClassRoom
     */
    public function setActive(int $active): ClassRoom
    {
        $this->active = $active;
        return $this;
    }
}
