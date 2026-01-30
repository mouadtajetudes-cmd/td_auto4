<?php

namespace App\DataFixtures;

use App\Entity\Batiment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $batiment = new Batiment();
        $batiment->setId(1);
        $batiment->setNom('Batiment A');
        $manager->persist($batiment);
        $manager->flush();
    }
}
