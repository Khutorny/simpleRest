<?php


namespace App\Infrastructure\Repository;


use App\Domain\Entity\ClassRoom;
use App\Domain\Repository\ClassRoomRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ClassRoomRepository implements ClassRoomRepositoryInterface
{
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(ClassRoom::class);
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $classRoomId
     * @return ClassRoom|null
     */
    public function findById(int $classRoomId): ?ClassRoom
    {
        return $this->repository->find($classRoomId);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param ClassRoom $classRoom
     */
    public function save(ClassRoom $classRoom): void
    {
        $this->entityManager->persist($classRoom);
        $this->entityManager->flush();
    }

    /**
     * @param ClassRoom $classRoom
     */
    public function delete(ClassRoom $classRoom): void
    {
        $this->entityManager->remove($classRoom);
        $this->entityManager->flush();
    }
}