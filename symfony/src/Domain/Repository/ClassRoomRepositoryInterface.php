<?php


namespace App\Domain\Repository;


use App\Domain\Entity\ClassRoom;

/**
 * Interface ClassRoomRepositoryInterface
 * @package App\Domain\Repository
 */
interface ClassRoomRepositoryInterface
{
    /**
     * @param int $classRoomId
     * @return ClassRoom|null
     */
    public function findById(int $classRoomId): ?ClassRoom;

    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param ClassRoom $classRoom
     */
    public function save(ClassRoom $classRoom): void;

    /**
     * @param ClassRoom $classRoom
     */
    public function delete(ClassRoom $classRoom): void;
}