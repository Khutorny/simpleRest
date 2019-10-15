<?php

namespace App\Infrastructure\DataFixtures;

use App\Domain\Entity\ClassRoom;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $classroom = (new ClassRoom())
            ->setName('5-A')
            ->setActive(0)
            ->setCreatedAt(new DateTime());

        $manager->persist($classroom);

        $manager->flush();
    }
}
