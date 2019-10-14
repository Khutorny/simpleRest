<?php


namespace App\Application\Service;


use App\Application\DTO\ClassRoomAssembler;
use App\Application\DTO\ClassRoomDTO;
use App\Domain\Entity\ClassRoom;
use App\Domain\Repository\ClassRoomRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;

/**
 * Class ClassRoomService
 * @package App\Application\Service
 */
class ClassRoomService
{
    /**
     * @var ClassRoomRepositoryInterface
     */
    private $classRoomRepository;
    /**
     * @var ClassRoomAssembler
     */
    private $classRoomAssembler;

    /**
     * ClassRoomService constructor.
     * @param ClassRoomRepositoryInterface $classRoomRepository
     * @param ClassRoomAssembler $classRoomAssembler
     */
    public function __construct(
        ClassRoomRepositoryInterface $classRoomRepository,
        ClassRoomAssembler $classRoomAssembler
    ) {
        $this->classRoomRepository = $classRoomRepository;
        $this->classRoomAssembler = $classRoomAssembler;
    }

    /**
     * @param int $id
     * @return ClassRoom
     * @throws EntityNotFoundException
     */
    public function getClassRoom(int $id): ClassRoom
    {
        $classRoom = $this->classRoomRepository->findById($id);
        if (null === $classRoom) {
            throw new EntityNotFoundException("Classroom with id {$id} was not found");
        }

        return $classRoom;
    }

    /**
     * @return array
     */
    public function getClassRooms(): array
    {
        return $this->classRoomRepository->findAll();
    }

    /**
     * @param ClassRoomDTO $classRoomDTO
     * @return ClassRoom
     */
    public function createClassRoom(ClassRoomDTO $classRoomDTO): ClassRoom
    {
        $classRoom = $this->classRoomAssembler->createClassRoom($classRoomDTO);
        $this->classRoomRepository->save($classRoom);

        return $classRoom;
    }

    /**
     * @param int $id
     * @param ClassRoomDTO $classRoomDTO
     * @return ClassRoom
     * @throws EntityNotFoundException
     */
    public function updateClassRoom(int $id, ClassRoomDTO $classRoomDTO): ClassRoom
    {
        $classRoom = $this->getClassRoom($id);
        $classRoom = $this->classRoomAssembler->updateClassRoom($classRoom, $classRoomDTO);
        $this->classRoomRepository->save($classRoom);

        return $classRoom;
    }

    /**
     * @param int $id
     * @throws EntityNotFoundException
     */
    public function deleteClassRoom(int $id): void
    {
        $classRoom = $this->getClassRoom($id);
        $this->classRoomRepository->delete($classRoom);
    }
}