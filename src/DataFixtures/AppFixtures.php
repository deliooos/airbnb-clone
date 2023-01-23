<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $equipment = new Equipment();
            $equipment->setName($this->faker->word);
            $manager->persist($equipment);
        }

        for  ($i = 0; $i < 10; $i++) {
            $type = new Type();
            $type->setName($this->faker->word);
            $manager->persist($type);
        }
        $manager->flush();
    }
}
