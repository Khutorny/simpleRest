<?php

namespace App\Controller;

use App\Application\Service\ClassRoomService;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ClassRoomController
{
    /**
     * @var ClassRoomService
     */
    private $classRoomService;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        ClassRoomService $classRoomService,
        SerializerInterface $serializer
    ) {
        $this->classRoomService = $classRoomService;
        $this->serializer = $serializer;
    }

    /**
     * @Route(path="/classrooms/{id}", name="get_classrom")
     * @param int $id
     * @return JsonResponse
     * @throws EntityNotFoundException
     */
    public function getClassRoom(int $id): JsonResponse
    {
        $classRoom = $this->classRoomService->getClassRoom($id);

        return new JsonResponse(
            $classRoom
//            $this->serializer->normalize($classRoom)
        );
    }
}