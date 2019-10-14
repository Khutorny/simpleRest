<?php


namespace App\Domain\Entity;


use App\Domain\Entity\Traits\IdTrait;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClassRoom
 *
 * @ORM\Entity
 * @ORM\Table(name="classroom")
 */
class ClassRoom
{
    use IdTrait;

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
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

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

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(): ClassRoom
    {
        $this->createdAt = new DateTime();
        return $this;
    }
}