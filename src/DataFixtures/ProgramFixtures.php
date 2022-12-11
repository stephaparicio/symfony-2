<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['Walking dead', 'Des zombies envahissent la terre','category_Horreur'],
        ['The witcher','Un mec avec des cheveux blanc et des pouvoirs','category_Fantastique'],
        ['Les supers nana', '4 spers nans type power rangers','category_Animation'],
        ['Once upon a time', 'il était une fois ...','category_Aventure'],
        ['supernatural', 'La nature est super','category_Horreur'],
    ];

    public function load(ObjectManager $manager){
        $loopIndex = 0;
        foreach (self::PROGRAM as [$title,$synopsis,$categoryName]) { 
        $program = new Program();
        $program->setTitle($title);
        $program->setSynopsis($synopsis);
        $program->setCategory($this->getReference($categoryName));
        $manager->persist($program);
        $manager->flush();
        $loopIndex++;
        $this->addReference('program_' . $loopIndex, $program);
    }
}
    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          AppFixtures::class,
        ];
    }
}
