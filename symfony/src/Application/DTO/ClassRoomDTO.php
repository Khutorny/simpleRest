<?php


namespace App\Application\DTO;


use DateTime;

class ClassRoomDTO
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $active;
    /**
     * @var DateTime
     */
    private $createdAt;

    public function __construct(string $name = '', int $active = 0, DateTime $createdAt = null)
    {
        $this->name = $name;
        $this->active = $active;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getActive(): int
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}