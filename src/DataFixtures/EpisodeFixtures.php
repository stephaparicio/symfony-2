<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture
{//Puis ici nous demandons à la Factory de nous fournir un Faker
    public function load(ObjectManager $manager): void
    {
    $faker = Factory::create();
    /**
    * L'objet $faker que tu récupère est l'outil qui va te permettre 
    * de te générer toutes les données que tu souhaites
    */
    for($j = 0; $j < 5 ; $j++){
        for($i = 0; $i < (count(CategoryFixtures::CATEGORIES) * ProgramFixtures::PROGRAM_LOOP * SeasonsFixtures::SEASON_PER_PROGRAM); $i++) {
            $episode = new Episode();
            //Ce Faker va nous permettre d'alimenter l'instance de episode que l'on souhaite ajouter en base
            $episode->setNumber($faker->numberBetween(1, 10));
            $episode->setTitle($faker->sentence(3, true));
            $episode->setSynopsis($faker->paragraphs(3, true));
            $episode->setSeason($this->getReference('season_' . $i, $episode));
            

           $manager->persist($episode);
        }
    }
    $manager->flush();
}
public function getDependencies()
{
    return [
        SeasonsFixtures::class,
    ];
}
}

