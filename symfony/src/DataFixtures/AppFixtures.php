<?php

namespace App\DataFixtures;

use App\Entity\ClassRoom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $classroom = (new ClassRoom())
            ->setName('5-A')
            ->setActive(0);

        $manager->persist($classroom);

        $manager->flush();
    }
}
