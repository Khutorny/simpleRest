<?php


namespace App\Domain\Entity\Traits;


use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTrait
{
    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }



//    public function prePersist(): void
//    {
//        $this->createdAt = $this->createdAt ?: new DateTime('now');
//    }
}