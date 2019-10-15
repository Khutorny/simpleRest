<?php


namespace App\Application\DTO;


use App\Domain\Entity\ClassRoom;

/**
 * Class ClassRoomAssembler
 * @package App\Application\DTO
 */
class ClassRoomAssembler
{
    /**
     * @param ClassRoomDTO $classRoomDTO
     * @param ClassRoom|null $classRoom
     * @return ClassRoom
     */
    public function readFromDTO(ClassRoomDTO $classRoomDTO, ?ClassRoom $classRoom = null): ClassRoom
    {
        if (null === $classRoom) {
            $classRoom = new ClassRoom();
            $classRoom->setCreatedAt();
        }

        $classRoom
            ->setName($classRoomDTO->getName())
            ->setActive($classRoomDTO->getActive());

        return $classRoom;
    }

    /**
     * @param ClassRoomDTO $classRoomDTO
     * @return ClassRoom
     */
    public function createClassRoom(ClassRoomDTO $classRoomDTO): ClassRoom
    {
        return $this->readFromDTO($classRoomDTO);
    }

    /**
     * @param ClassRoom $classRoom
     * @param ClassRoomDTO $classRoomDTO
     * @return ClassRoom
     */
    public function updateClassRoom(ClassRoom $classRoom, ClassRoomDTO $classRoomDTO): ClassRoom
    {
        return $this->readFromDTO($classRoomDTO, $classRoom);
    }

    /**
     * @param ClassRoom $classRoom
     * @return ClassRoomDTO
     */
    public function writeDTO(ClassRoom $classRoom): ClassRoomDTO
    {
        return new ClassRoomDTO(
            $classRoom->getName(),
            $classRoom->getActive(),
            $classRoom->getCreatedAt()
        );
    }
}