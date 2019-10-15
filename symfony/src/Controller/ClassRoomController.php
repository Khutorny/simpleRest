<?php

namespace App\Controller;

use App\Application\DTO\ClassRoomDTO;
use App\Application\Service\ClassRoomService;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use TypeError;

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
     * @Route(path="/classrooms/{id}", methods={"GET"}, name="get_classroom")
     * @param int $id
     * @return JsonResponse
     */
    public function getClassRoom(int $id): JsonResponse
    {
        try {
            $classRoom = $this->classRoomService->getClassRoom($id);
        } catch (EntityNotFoundException $exception) {
            return $this->error($exception->getMessage());
        }

        return new JsonResponse(
            $this->serializer->normalize($classRoom),
            Response::HTTP_OK
        );
    }

    /**
     * @Route(path="/classrooms", methods={"GET"}, name="get_classrooms")
     * @return JsonResponse
     */
    public function getClassRooms(): JsonResponse
    {
        $classRooms = $this->classRoomService->getClassRooms();
        return new JsonResponse(
            $this->serializer->normalize($classRooms),
            Response::HTTP_OK
        );
    }

    /**
     * @Route(path="/classrooms/{id}", methods={"DELETE"}, name="delete_classroom")
     * @param int $id
     * @return JsonResponse
     */
    public function deleteClassroom(int $id)
    {
        try {
            $this->classRoomService->deleteClassRoom($id);
        } catch (EntityNotFoundException $exception) {
            return $this->error($exception->getMessage());
        }
        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route(path="/classrooms", methods={"POST"}, name="create_classroom")
     * @param Request $request
     * @return JsonResponse
     */
    public function createClassRoom(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        try {
            $dto = new ClassRoomDTO(
                isset($data['name']) ? $data['name'] : null,
                isset($data['active']) ? $data['active'] : 0
            );
        } catch (TypeError $exception) {
            return $this->error('Invalid data passed');
        }

        $classRoom = $this->classRoomService->createClassRoom($dto);

        return new JsonResponse(
            $this->serializer->normalize($classRoom),
            Response::HTTP_CREATED
        );
    }

    /**
     * @Route(path="/classrooms/{id}", methods={"PUT", "PATCH"}, name="update_classroom")
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function updateClassRoom(int $id, Request $request): JsonResponse
    {
        try {
            $classRoom = $this->classRoomService->getClassRoom($id);

            $data = json_decode($request->getContent(), true);
            $dto = new ClassRoomDTO(
                isset($data['name']) ? $data['name'] : $classRoom->getName(),
                isset($data['active']) ? $data['active'] : $classRoom->getActive()
            );

            $classRoom = $this->classRoomService->updateClassRoom($id, $dto);
        } catch (EntityNotFoundException $exception) {
            return $this->error($exception->getMessage());
        } catch (TypeError $exception) {
            return $this->error('Invalid data passed');
        }

        return new JsonResponse(
            $this->serializer->normalize($classRoom),
            Response::HTTP_OK
        );
    }

    public function error(?string $message): JsonResponse
    {
        $errorData = [
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => $message
        ];

        return new JsonResponse(
            $errorData,
            Response::HTTP_BAD_REQUEST
        );
    }
}