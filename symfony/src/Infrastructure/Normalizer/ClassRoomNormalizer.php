<?php


namespace App\Infrastructure\Normalizer;


use App\Domain\Entity\ClassRoom;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ClassRoomNormalizer extends AbstractNormalizer
{
    /**
     * @inheritDoc
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
            'active' => $object->getActive(),
            'created_at' => $object->getCreatedAt()->format('Y-m-d H:i:s')
        ];
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof ClassRoom;
    }
}