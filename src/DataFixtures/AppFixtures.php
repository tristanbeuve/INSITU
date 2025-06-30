<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cara; // Assurez-vous que le chemin est correct
use App\Entity\Evenement; // Assurez-vous que le chemin est correct
use App\Entity\Groupe; // Assurez-vous que le chemin est correct
use App\Entity\Participant; // Assurez-vous que le chemin est correct
use App\Entity\Pays; // Assurez-vous que le chemin est correct
use App\Entity\Periode; // Assurez-vous que le chemin est correct
use App\Entity\MessengerMessages; // Assurez-vous que le chemin est correct

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       // Fixtures pour Cara
        $caraData = [
            ['nom' => 'Cara1'],
            ['nom' => 'Cara2'],
            ['nom' => 'Cara3'],
            ['nom' => 'Cara4'],
            ['nom' => 'Cara5'],
        ];

        foreach ($caraData as $data) {
            $cara = new Cara();
            $cara->setNom($data['nom']);
            $manager->persist($cara);
        }

        // Fixtures pour Evenement
        $evenementData = [
            ['nom' => 'Event1', 'description' => 'Description1', 'date' => new \DateTime('2023-04-13'), 'dateFin' => new \DateTime('2023-07-08'), 'heure' => new \DateTime('10:00:00'), 'heureFin' => new \DateTime('12:00:00')],
            ['nom' => 'Event2', 'description' => 'Description2', 'date' => new \DateTime('2023-12-15'), 'dateFin' => new \DateTime('2023-01-21'), 'heure' => new \DateTime('11:00:00'), 'heureFin' => new \DateTime('13:00:00')],
            // Ajoutez d'autres événements ici
        ];

        foreach ($evenementData as $data) {
            $evenement = new Evenement();
            $evenement->setNom($data['nom']);
            $evenement->setDescription($data['description']);
            $evenement->setDate($data['date']);
            $evenement->setDateFin($data['dateFin']);
            $evenement->setHeure($data['heure']);
            $evenement->setHeureFin($data['heureFin']);
            $manager->persist($evenement);
        }

        // Ajoutez des fixtures pour les autres entités de manière similaire

        $manager->flush();
    }
}
